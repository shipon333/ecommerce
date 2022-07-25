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
use App\User;
use Cart;
use Mail;
class Controllercustomer extends Controller
{
    //
    public function customerview(){
    	$data['customers'] = User::where('usertype','customer')->where('status','1')->get();
    	return view('backend.layouts.customers.customer-view',$data);
    }
    public function customerdelete(Request $request){
    	$customer = User::findorfail($request->id);
        $customer = User::findorfail($request->id);
        if(file_exists('public/upload/users/'.$customer->image) AND !empty($customer->image)){
            unlink('public/upload/users/'.$customer->image);
        }
        $customer->delete();
        return redirect()->route('customers.view')->with('success','Data delete successful');
    }
    public function customerdraft(){
    	$data['customers'] = User::where('usertype','customer')->where('status','0')->get();
    	return view('backend.layouts.customers.customer-draft',$data);
    }
}
