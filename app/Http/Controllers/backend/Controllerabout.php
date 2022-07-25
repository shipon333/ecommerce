<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\About;

class Controllerabout extends Controller
{
    public function view(){
        $countabout= About::count();
    	$abouts = About::All();
    	return view('backend.layouts.abouts.aboutview', compact('abouts','countabout'));
    }
    public function add(){
    	return view('backend.layouts.abouts.addabout');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
         ]);
    	$data = new About();
    	$data->title = $request->title;
    	$data->subtitle = $request->sub_title;
    	$data->details = $request->details;
    	$data->link = $request->link_name;
        $data->create_by = Auth::User()->id;
    	if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/abouts'), $filename);
            $data['image']=$filename;
        }
    	$data->save();
    	return redirect()->route('abouts.view')->with('success','About insert successful');
    }
    public function edit($id){
        $aboutedit = About::findorfail($id);
        return view('backend.layouts.abouts.aboutedit',compact('aboutedit'));
    }
    public function update(Request $request, $id){
        //$validatedData = $request->validate([
            //'email' =>'unique:users,email',
        //]);
        $updateabout = About::findorfail($id);
       	$updateabout->title = $request->title;
    	$updateabout->subtitle = $request->sub_title;
    	$updateabout->details = $request->details;
    	$updateabout->link = $request->link_name;
        $updateabout->update_by = Auth::User()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/abouts/'.$updateabout->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/abouts'), $filename);
            $updateabout['image']=$filename;
        }
        $updateabout->save();
        return redirect()->route('abouts.view')->with('success','About update successful');
    }
    public function delete(Request $request){
        $deleteabout = About::findorfail($request->id);
        if(file_exists('public/upload/abouts/'.$deleteabout->image) AND !empty($deleteabout->image)){
            unlink('public/upload/abouts/'.$deleteabout->image);
        }
        $deleteabout->delete();
        return redirect()->route('abouts.view')->with('success','About delete successful');
    }
}
