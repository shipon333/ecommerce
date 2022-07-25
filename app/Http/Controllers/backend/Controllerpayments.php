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
use App\Model\PaymentMethod;
use App\Model\Methode;
use App\Requests\ProductRequest;

use Auth;
use DB;

class Controllerpayments extends Controller
{
    public function view(){
    	$data['alldata'] = PaymentMethod::All();
    	return view('backend.layouts.payments.payments-view', $data);
    }
    public function add(){
        $data['methodes'] = Methode::All();
    	return view('backend.layouts.payments.payments-add',$data);
    }
    public function store(Request $request){
        $data = new PaymentMethod();
    	$data->method_id = $request->method_id;
    	$data->mobile = $request->mobile;
    	$data->type = $request->account_type;
    	$data->details = $request->details;
    	$data->save(); 
    	return redirect()->route('payments.view')->with('success','Payments insert successful');
    }
    public function edit($id){
        $data['methodes'] = Methode::All();
        $data['editpayment'] = PaymentMethod::find($id);
    	return view('backend.layouts.payments.payments-edit',$data);
    }

     public function update(Request $request, $id){
        
        $updatepayment = PaymentMethod::findorfail($id);
        $updatepayment->method_id = $request->method_id;
    	$updatepayment->mobile = $request->mobile;
    	$updatepayment->type = $request->account_type;
    	$updatepayment->details = $request->details;
    	$updatepayment->save();
        return redirect()->route('payments.view')->with('success','Payment update successful');
    }
     public function delete(Request $request){
        $payments = PaymentMethod::find($request->id);
		$payments->delete();
        return redirect()->route('payments.view')->with('success','Payment Delete successful');
    }
}
