<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Logo;
class ControllerLogo extends Controller
{
     public function view(){
        $countlogo= Logo::count();
    	$logos = Logo::All();
    	return view('backend.layouts.logos.view', compact('logos','countlogo'));
    }
    public function add(){
    	return view('backend.layouts.logos.addlogo');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
         ]);
    	$data = new Logo();
         $data->create_by = Auth::User()->id;
    	if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logos'), $filename);
            $data['image']=$filename;
        }
    	$data->save();
    	return redirect()->route('logos.view')->with('success','Logo insert successful');
    }
    public function edit($id){
        $logoedit = Logo::findorfail($id);
        return view('backend.layouts.logos.editlogo',compact('logoedit'));
    }
    public function update(Request $request, $id){
        //$validatedData = $request->validate([
            //'email' =>'unique:users,email',
        //]);
        $updatelogo = Logo::findorfail($id);
        $updatelogo->update_by = Auth::User()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/logos/'.$updatelogo->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logos'), $filename);
            $updatelogo['image']=$filename;
        }
        $updatelogo->save();
        return redirect()->route('logos.view')->with('success','Logo update successful');
    }
    public function delete(Request $request){
        $deletelogo = Logo::findorfail($request->id);
        if(file_exists('public/upload/logos/'.$deletelogo->image) AND !empty($deletelogo->image)){
            unlink('public/upload/logos/'.$deletelogo->image);
        }
        $deletelogo->delete();
        return redirect()->route('logos.view')->with('success','Logo delete successful');
    }
}
