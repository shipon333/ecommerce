<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Size;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Requests\ProductRequest;
use Auth;
use DB;
class Controllerproduct extends Controller
{
    public function view(){
    	$data['alldata'] = Product::orderBy('id','desc')->get();
    	return view('backend.layouts.products.products-view', $data);
    }
    public function add(){
    	$data['categorys'] = Category::All();
    	$data['brands'] = Brand::All();
    	$data['colors'] = Color::All();
    	$data['sizes'] = Size::All();
    	return view('backend.layouts.products.products-add',$data);
    }
    public function store(Request $request){
    	DB::transaction(function() use($request){
    		 $validatedData = $request->validate([
	            'name' => 'required|unique:products,name',
	            'color_id' => 'required',
	            'size_id' => 'required',
	         ]);
	    	$product = new Product();
	    	$product->category_id = $request->category_id;
	    	$product->brand_id = $request->brand_id;
	    	$product->name = $request->name;
	    	$product->slug = str_slug($request->name);
	    	$product->price = $request->price;
	    	$product->sort_desc = $request->short_desc;
	    	$product->long_desc = $request->long_desc;
	    	if ($request->file('image')){
	            $file = $request->file('image');
	            $filename = date('YmdHi').$file->getClientOriginalName();
	            $file->move(public_path('upload/product_image/'), $filename);
	            $product['image']=$filename;
	        }
	        if($product->save()){	 
	        	// multipule sub image insert       	
				$files = $request->sub_image;
				if(!empty($files)){
					foreach($files as $file){
						$imgname = date('YmdHi').$file->getClientOriginalName();
					    $file->move(public_path('upload/product_image/sub_image/'), $imgname);
					    $subimage['sub_image']=$imgname;
						$subimage = new ProductSubImage();
						$subimage->product_id = $product->id;
						$subimage->subimage = $imgname ;
						$subimage->save();
					}
				}
				// multipule color insert
				$colors = $request->color_id;
				if(!empty($colors)){
					foreach($colors as $color){
						$product_color = new ProductColor();
						$product_color->product_id = $product->id;
						$product_color->color_id = $color ;
						$product_color->save();
					}
				}
				// multipule size insert
				$sizes = $request->size_id;
				if(!empty($sizes)){
					foreach($sizes as $size){
						$product_size = new ProductSize();
						$product_size->product_id = $product->id;
						$product_size->size_id = $size ;
						$product_size->save();
					}
				}
	        }
	        else{
	        	return redirect()->back()->with('error','Sorry! Data not saved');
	        }
	
		});
       
    	return redirect()->route('products.view')->with('success','Product insert successful');
    }
    public function edit($id){
        $data['editproducts'] = Product::find($id);
        $data['categorys'] = Category::All();
    	$data['brands'] = Brand::All();
    	$data['colors'] = Color::All();
    	$data['sizes'] = Size::All();
    	$data['color_array']= ProductColor::select('color_id')->where('product_id',$data['editproducts']->id)->orderBy('id','asc')->get()->toArray();
    	$data['size_array']= ProductSize::select('size_id')->where('product_id',$data['editproducts']->id)->orderBy('id','asc')->get()->toArray();
    	return view('backend.layouts.products.products-edit',$data);
    }
    public function update(Request $request, $id){
        DB::transaction(function() use($request, $id){
    		 $validatedData = $request->validate([
	            'color_id' => 'required',
	            'size_id' => 'required',
	         ]);
	    	$product = Product::find($id);
	    	$product->category_id = $request->category_id;
	    	$product->brand_id = $request->brand_id;
	    	$product->name = $request->name;
	    	$product->price = $request->price;
	    	$product->sort_desc = $request->short_desc;
	    	$product->long_desc = $request->long_desc;
	    	if ($request->file('image')){
	            $file = $request->file('image');
	            $filename = date('YmdHi').$file->getClientOriginalName();
	            $file->move(public_path('upload/product_image/'), $filename);
	            if(file_exists('public/upload/product_image/'.$product->image) AND !empty($product->image)){
		            unlink('public/upload/product_image/'.$product->image);
		        }
	            $product['image']=$filename;
	        }
	        if($product->save()){	 
	        	// multipule sub image insert       	
				$files = $request->sub_image;
				if(!empty($files)){
					$subImage = ProductSubImage::where('product_id',$id)->get()->toArray();
					foreach($subImage as $value){
						if(!empty($value)){
							unlink('public/upload/product_image/sub_image/'.$value['subimage']);
						}
					}
				ProductSubImage::where('product_id',$id)->delete();
				}
				if(!empty($files)){
					foreach($files as $file){
						$imgname = date('YmdHi').$file->getClientOriginalName();
					    $file->move(public_path('upload/product_image/sub_image/'), $imgname);
					    $subimage['sub_image']=$imgname;
						$subimage = new ProductSubImage();
						$subimage->product_id = $product->id;
						$subimage->subimage = $imgname ;
						$subimage->save();
					}
				}
				// multipule color insert
				$colors = $request->color_id;
				if(!empty($colors)){
					ProductColor::where('product_id',$id)->delete();
				}
				if(!empty($colors)){
					foreach($colors as $color){
						$product_color = new ProductColor();
						$product_color->product_id = $product->id;
						$product_color->color_id = $color ;
						$product_color->save();
					}
				}
				// multipule size insert
				$sizes = $request->size_id;
				if(!empty($sizes)){
					ProductSize::where('product_id',$id)->delete();
				}
				if(!empty($sizes)){
					foreach($sizes as $size){
						$product_size = new ProductSize();
						$product_size->product_id = $product->id;
						$product_size->size_id = $size ;
						$product_size->save();
					}
				}
	        }
	        else{
	        	return redirect()->back()->with('error','Sorry! Data not Update');
	        }
	
		});
       
    	return redirect()->route('products.view')->with('success','Product Update successful');
    }
     public function delete(Request $request){
        $product = Product::find($request->id);
        if(file_exists('public/upload/product_image/'.$product->image) AND !empty($product->image)){
		      unlink('public/upload/product_image/'.$product->image);
		    }
	    $subImage = ProductSubImage::where('product_id',$product->id)->get()->toArray();
			if (!empty($subImage)) {
				foreach($subImage as $value){
					if(!empty($value)){
						unlink('public/upload/product_image/sub_image/'.$value['subimage']);
					}
				}
			}
		ProductSubImage::where('product_id',$product->id)->delete();
		ProductColor::where('product_id',$product->id)->delete();
		ProductSize::where('product_id',$product->id)->delete();
		$product->delete();
        return redirect()->route('products.view')->with('success','Product Delete successful');
    }
    public function details($id){
    	$data['product'] = Product::find($id);
    	return view('backend.layouts.products.products-details',$data);
    }
}
