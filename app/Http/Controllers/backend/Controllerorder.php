<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Payment;
use App\Model\Methode;
use App\Model\PaymentMethod;
use App\User;
use Cart;
use Mail;
use DB;
use Auth;
use Session;
class Controllerorder extends Controller
{
    // 
    public function OrderPanddingView(){
    	$data['orders'] = Order::where('status','0')->orderBy('id','desc')->get();
      	return view('backend.layouts.orders.orders-pandding',  $data);

    }
     public function OrderApproveView(){
    	$data['orders'] = Order::where('status','1')->orderBy('id','desc')->get();
      	return view('backend.layouts.orders.orders-approve',  $data);

    }
    public function OrderDetailsView($id){
    	$data['orders'] = Order::find($id);
    	return view('backend.layouts.orders.orders-details',  $data);
    }

    public function OrderApprove(Request $request){
    	$data = Order::find($request->id);
    	$data->status = '1';
    	$data->save();
    }
}
