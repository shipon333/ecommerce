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
use App\User;
use Cart;
use Mail;
use DB;
use Auth;
use Session;
class ControllerCheckout extends Controller
{
    public function customerLogin(){
    	$data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
    	return view('front-end.layouts.customer-login',$data);
    }

    public function customerSignup(){
    	$data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
    	return view('front-end.layouts.customer-signup',$data);
    }

    public function customerStore(Request $request){
        DB::transaction(function() use($request) {
            $validatedData = $request->validate([
                'name' =>'required',
                'email' =>'required|unique:users,email',
                'mobile' =>['required','unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
                
            ]);
            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->password = bcrypt($request->password);
            $user->code = $code;
            $user->status = '0';
            $user->usertype = 'customer';
            $user->save();

            $user = array(
                    'email' => $request->email,
                    'code' => $code,
                );
            Mail::send('front-end.layouts.emails.email-verify',$user, function($massage) use($user){
                $massage->from('engshipon.66@gmail.com', 'SM Soft');
                $massage->to($user['email']);
                $massage->subject('Please verify your email !');
            });

        });
        return redirect()->route('customer.verify')->with('success','Please verify your email !');
       
    }

    public function customerVerify(){
        $data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
        return view('front-end.layouts.emails.customer-verify',$data);
    }
    public function emailVerify(Request $request){
        $validatedData = $request->validate([
                'email' =>'required',
                'code' =>'required',  
            ]);
        $verify_email = User::where('email',$request->email)->where('code',$request->code)->first();
        if ($verify_email) {
            $verify_email->status ='1';
            $verify_email->save();
            return redirect()->route('login.customer')->with('success','Successfull Verify Your Email');
        }
        else{
            return redirect()->back()->with('error','Sorry Your Email and Code Dosnot Match !');
        }
    }

    public function chaeckOut(){
        $data['logos'] = Logo::first();
        $data['contacts'] = Contact::first();
        return view('front-end.layouts.cheackouts.cheack-out',$data);
    }

    public function chaeckOutstore(Request $request){
        $validatedData = $request->validate([
                'name' =>'required',
                'email' =>'required',
                'mobile' =>['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
                'address' =>'required',
                
            ]);
        $cheackout = new Shipping();
        $cheackout->user_id  = Auth::user()->id;
        $cheackout->name = $request->name;
        $cheackout->email = $request->email;
        $cheackout->mobile = $request->mobile;
        $cheackout->address = $request->address;
        $cheackout->save();
        Session::put('shipping_id',$cheackout->id);

        return redirect()->route('checkout.payments')->with('success','Cheack Out Successfull');
    }
}
