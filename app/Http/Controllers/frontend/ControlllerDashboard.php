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
class ControlllerDashboard extends Controller
{
    //
    public function dashboard(){
    	$data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
        $id = Auth::User()->id;
	   	$data['user'] = User::find($id);
    	return view('front-end.layouts.profile.customer-dashboard',$data);
    }
    public function dashboardEdit(){
    	$data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
    	$id = Auth::User()->id;
	   	$data['editdata'] = User::find($id);
	   	return view('front-end.layouts.profile.dashboard-edit', $data);
    }
    public function dashboardUpdate(Request $request){
    	$data = User::find(Auth::User()->id);
    	$this->validate($request,[
            'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
            'name' =>'required',
            'email' =>'required|unique:users,email,'.$data->id,
            'mobile' =>['required','unique:users,mobile,'.$data->id,'regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
         ]);
   		$data->name = $request->name;
   		$data->email = $request->email;
   		$data->mobile = $request->mobile;
   		$data->address = $request->address;
   		$data->gender = $request->gender;
   		
   		if ($request->file('image')){
   			$file = $request->file('image');
   			@unlink(public_path('upload/users/'.$data->image));
   			$filename = date('YmdHi').$file->getClientOriginalName();
   			$file->move(public_path('upload/users'),$filename);
   			$data['image']=$filename;
   		}
		$data->save();
		return redirect()->route('dashboard')->with('success','Data Update successful');
    }
    public function changedashboardPassword(){
    	$data['logos'] = Logo::first();
      $data['contacts'] = Contact::first();
    	return view('front-end.layouts.profile.dashboard-password',  $data);
    }
    public function updatedashboardPassword(Request $request){
    	if (Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->old_password])) {
	         $user = User::find(Auth::User()->id);
	         $user->password = bcrypt($request->new_password);
	         $user->save();
	          return redirect()->route('dashboard')->with('success','Password Update successful');
	      }
	      else{
	            return redirect()->back()->with('error','Sorry Old Password dos not match!');
	      }
    }

    public function checkoutPayments(){
      $data['logos'] = Logo::first();
      $data['contacts'] = Contact::first();
      $data['methodes'] = PaymentMethod::get();
      return view('front-end.layouts.cheackouts.payments',  $data);
    }

    public function checkoutPaymentStore(Request $request){
      if ($request->produt_id == NULL) {
        return redirect()->back()->with('massage','Sorry You Are Not Selected Any Product');
      }else{
        if ($request->name == 'Bkash' && $request->transection_id == NULL) {
           return redirect()->back()->with('massage','Sorry You Are Not Enter Transaction ID');
          }
        else{
          DB::transaction(function() use($request){
              $payment = new Payment();
              $payment->payment_methods = $request->name;
              $payment->transection_id = $request->transection_id;
              $payment->save();
              $order = new Order();
              $order->user_id = Auth::user()->id;
              $order->shipping_id = Session::get('shipping_id');
              $order->payment_id   = $payment->id;
              $order_data = Order::orderBy('id','desc')->first();
                if($order_data == NULL){
                  $orderReg = '0';
                  $order_no = $orderReg+1;
                }
                else{
                  $order_data = Order::orderBy('id','desc')->first()->order_no;
                  $order_no = $order_data+1;
                }
              $order->order_no   = $order_no;
              $order->order_total   = $request->order_total;
              $order->status    = '0';
              $order->save();

              $contents = Cart::content();

              foreach ($contents as $content) {
                  $order_details = new OrderDetail();
                  $order_details->order_id = $order->id;
                  $order_details->product_id = $content->id;
                  $order_details->color_id = $content->options->color_id;
                  $order_details->size_id = $content->options->size_id;
                  $order_details->quentity = $content->qty;
                  $order_details->save();
                }


            });
        }

      }
          Cart::destroy();
          return redirect()->route('order.list')->with('success','Order Complete Successfull');
      }
      public function OrderList(){
       $data['logos'] = Logo::first();
      $data['contacts'] = Contact::first();
      $data['orders'] = Order::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
      return view('front-end.layouts.cheackouts.orders',  $data);
      }
      public function OrderDetails($id){
        $orderData = Order::find($id);
        $order_id = Order::where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
            if($order_id == false){
                return redirect()->back()->with('error','Sorry Your are a wrong');
            }
            else{
                $data['logos'] = Logo::first();
                $data['contacts'] = Contact::first();
                $data['orders'] = Order::with(['order_details'])->where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
                return view('front-end.layouts.cheackouts.orders-details',  $data);
            }
      }
}
