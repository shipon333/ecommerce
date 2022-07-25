<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Banner;
use App\Model\Contact;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Size;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use Cart;
class ControllerCart extends Controller
{
    public function addTocart(Request $request){
        $validatedData = $request->validate([
	        'size_id' => 'required',
	        'color_id' => 'required',
	    ]);
        
        $product = Product::where('id',$request->id)->first();
        $product_size = Size::where('id',$request->size_id)->first();

        $product_color = Color::where('id',$request->color_id)->first();
		Cart::add([
			'id'=>$product->id,
			'qty'=>$request->qty,
			'price'=>$product->price,
			'name'=>$product->name,
			'weight'=>550,
			'options'=>[
					'size_id'=>$request->size_id,
					'size_name'=>$product_size->name,
					'color_id'=>$request->color_id,
					'color_name'=>$product_color->name,
					'image'=>$product->image
				],
		]);
		return redirect()->route('show.cart')->with('success','Add To Cart successful');
    }
    public function showTocart(){
    	$data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
    	return view('front-end.layouts.shoping-cart',$data);
    }

    public function updateTocart(Request $request){
    	Cart::update($request->rowId,$request->qty);
    	return redirect()->route('show.cart')->with('success','Update To Cart successful');
    }
    public function deleteTocart($rowId){
    	Cart::remove($rowId);
    	return redirect()->route('show.cart')->with('success','Delete To Cart successful');
    }

   
}
