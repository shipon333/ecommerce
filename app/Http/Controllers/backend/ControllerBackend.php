<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class ControllerBackend extends Controller
{
    public function view(){
    	$users = User::where('usertype','Admin')->where('status','1')->get();
    	return view('backend.layouts.users.user', compact('users'));
    }
    public function add(){
    	return view('backend.layouts.users.adduser');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
                'email' =>'required|unique:users,email',
                
            ]);
    	$data = new User();
        $data->usertype = 'Admin';
    	$data->role = $request->role;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = bcrypt($request->password);
    	$data->save();
    	return redirect()->route('user.view')->with('success','Data insert successful');
    }
    public function edit($id){
        $data = User::findorfail($id);
        return view('backend.layouts.users.edituser',compact('data'));
    }
    public function update(Request $request, $id){
        $updatedata = User::findorfail($id);
        $validatedData = $request->validate([
            'email' =>'unique:users,email,'.$updatedata->id,
        ]);
        $updatedata->role = $request->role;
        $updatedata->name = $request->name;
        $updatedata->email = $request->email;
        $updatedata->save();
        return redirect()->route('user.view')->with('success','Data update successful');
    }
    public function delete(Request $request){
        $deletedata = User::findorfail($request->id);
        if(file_exists('public/upload/users/'.$deletedata->image) AND !empty($deletedata->image)){
            unlink('public/upload/users/'.$deletedata->image);
        }
        $deletedata->delete();
        return redirect()->route('user.view')->with('success','Data delete successful');
    }
}
