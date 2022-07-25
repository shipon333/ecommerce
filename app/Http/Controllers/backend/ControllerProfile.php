<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
class ControllerProfile extends Controller
{
   public function view(){
	   	$id = Auth::User()->id;
	   	$user = User::find($id);
	   	 return view('backend.layouts.profiles.viewprofile', compact('user'));
   }

   public function edit(){
	   	$id = Auth::User()->id;
	   	$editdata = User::find($id);
	   	return view('backend.layouts.profiles.editprofile', compact('editdata'));
   }

   public function update(Request $request){
         $validatedData = $request->validate([
            'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
         ]);
   		$data = User::find(Auth::User()->id);
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
   		return redirect()->route('profils.view')->with('success','Data Update successful');

   }
   public function changePassword(){
      return view('backend.layouts.profiles.change_password');
   }
   public function updatePassword(Request $request){
      if (Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->old_password])) {
         $user = User::find(Auth::User()->id);
         $user->password = bcrypt($request->new_password);
         $user->save();
          return redirect()->route('profils.view')->with('success','Password Update successful');
      }
      else{
            return redirect()->back()->with('error','Sorry Old Password dos not match!');
      }  
   }
}
