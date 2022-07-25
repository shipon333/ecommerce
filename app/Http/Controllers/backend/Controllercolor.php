<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Color;
use DB;
class Controllercolor extends Controller
{
    public function view(){
    	$data['colors'] = Color::All();
    	return view('backend.layouts.colors.colors-view', $data);
    }
    public function add(){
    	return view('backend.layouts.colors.color-add');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:colors,name',
         ]);
    	$data = new Color();
    	$data->name = $request->name;
        $data->create_by = Auth::User()->id;
    	$data->save();
    	return redirect()->route('colors.view')->with('success','Color insert successful');
    }
    public function edit($id){
        $coloredit = Color::findorfail($id);
        return view('backend.layouts.colors.colors-edit',compact('coloredit'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:colors,name',
         ]);
        $updatecolor = Color::findorfail($id);
       	$updatecolor->name = $request->name;
        $updatecolor->update_by = Auth::User()->id;
        $updatecolor->save();
        return redirect()->route('colors.view')->with('success','Color update successful');
    }
     public function delete(Request $request){
        $deletecolor = Color::findorfail($request->id);
        $deletecolor->delete();
        return redirect()->route('colors.view')->with('success','Color Delete Successful');
    }
}
