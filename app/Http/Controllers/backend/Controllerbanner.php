<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Banner;

class Controllerbanner extends Controller
{
     public function view(){
        $countbanner= Banner::count();
    	$banners = Banner::All();
    	return view('backend.layouts.banners.bannerview', compact('banners','countbanner'));
    }
    public function add(){
    	return view('backend.layouts.banners.addbanner');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
         ]);
    	$data = new Banner();
    	$data->title = $request->title;
    	$data->subtitle = $request->sub_title;
    	$data->link = $request->link_name;
        $data->create_by = Auth::User()->id;
    	if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/banners'), $filename);
            $data['image']=$filename;
        }
    	$data->save();
    	return redirect()->route('banners.view')->with('success','Banner insert successful');
    }
    public function edit($id){
        $banneredit = Banner::findorfail($id);
        return view('backend.layouts.banners.editbanner',compact('banneredit'));
    }
    public function update(Request $request, $id){
        //$validatedData = $request->validate([
            //'email' =>'unique:users,email',
        //]);
        $updatebanner = Banner::findorfail($id);
        $updatebanner->title = $request->title;
    	$updatebanner->subtitle = $request->sub_title;
    	$updatebanner->link = $request->link_name;
        $updatebanner->update_by = Auth::User()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/banners/'.$updatebanner->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/banners'), $filename);
            $updatebanner['image']=$filename;
        }
        $updatebanner->save();
        return redirect()->route('banners.view')->with('success','Banner update successful');
    }
    public function delete(Request $request){
        $deletebanner = Banner::findorfail($request->id);
        if(file_exists('public/upload/banners/'.$deletebanner->image) AND !empty($deletebanner->image)){
            unlink('public/upload/banners/'.$deletebanner->image);
        }
        $deletebanner->delete();
        return redirect()->route('banners.view')->with('success','Banner delete successful');
    }
    
}
