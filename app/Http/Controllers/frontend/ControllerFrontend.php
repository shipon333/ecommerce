<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Banner;
use App\Model\Contact;
use App\Model\Product;
use App\Model\Category;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\Communicate;
use Mail;

class ControllerFrontend extends Controller
{
    public function index(){
        $data['logos'] = Logo::first();
        $data['banners'] = Banner::all();
        $data['contacts'] = Contact::first();
        $data['categorys'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id','desc')->paginate(12);
    	return view('front-end.layouts.home',$data);
    }
    public function allProducts(){
        $data['logos'] = Logo::first();
        $data['banners'] = Banner::all();
        $data['contacts'] = Contact::first();
        $data['categorys'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id','desc')->paginate(12);
        return view('front-end.layouts.all-products',$data);
    }
    public function categoryWaisProducts($category_id){
        $data['logos'] = Logo::first();
        $data['banners'] = Banner::all();
        $data['contacts'] = Contact::first();
        $data['categorys'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        return view('front-end.layouts.category-wais-products',$data);
    }
    public function brandWaisProducts($brand_id){
        $data['logos'] = Logo::first();
        $data['banners'] = Banner::all();
        $data['contacts'] = Contact::first();
        $data['categorys'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
        return view('front-end.layouts.brand-wais-products',$data);
    }
    public function ProductInfoDetails($slug){
        $data['logos'] = Logo::first();
        $data['banners'] = Banner::all();
        $data['contacts'] = Contact::first();
        $data['product'] = Product::where('slug',$slug)->first();
        $data['subImages'] = ProductSubImage::where('product_id',$data['product']->id)->get();
        $data['sizes'] = ProductSize::where('product_id',$data['product']->id)->get();
        $data['colors'] = ProductColor::where('product_id',$data['product']->id)->get();
        return view('front-end.layouts.product-info-details',$data);
    }
    public function about(){
        $data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
    	return view('front-end.layouts.about',$data);
    }
     public function shopinCart(){
        $data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
    	return view('front-end.layouts.shoping-cart',$data);
    }
     public function contact(){
        $data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
    	return view('front-end.layouts.contact',$data);
    }
    public function communicate(Request $request){
        $data = new Communicate();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->massage = $request->msg;
        $data->save();

        $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'mibile' => $request->mobile,
                'massage' => $request->msg,
            );
        Mail::send('front-end.layouts.emails.contact',$data, function($massage) use($data){
            $massage->from('shipon.cmt.eng.66@gmail.com', 'SM');
            $massage->to($data['email']);
            $massage->subject('Thank For Contact Us');
        });
        return redirect()->back()->with('success','Your Massage Sent Successfull');
    }

}
