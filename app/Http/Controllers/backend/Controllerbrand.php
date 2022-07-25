<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Brand;
use DB;
class Controllerbrand extends Controller
{
    public function view(){
    	$data['brands'] = Brand::All();
    	return view('backend.layouts.brands.brands-view', $data);
    }
    public function add(){
    	return view('backend.layouts.brands.brand-add');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:brands,name',
         ]);
    	$data = new Brand();
    	$data->name = $request->name;
        $data->create_by = Auth::User()->id;
    	$data->save();
    	return redirect()->route('brands.view')->with('success','Brand insert successful');
    }
    public function edit($id){
        $brandedit = Brand::findorfail($id);
        return view('backend.layouts.brands.brand-edit',compact('brandedit'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:brands,name',
         ]);
        $updatebrand = Brand::findorfail($id);
       	$updatebrand->name = $request->name;
        $updatebrand->update_by = Auth::User()->id;
        $updatebrand->save();
        return redirect()->route('brands.view')->with('success','Brand update successful');
    }
     public function delete(Request $request){
        $deletebrand = Brand::findorfail($request->id);
        $deletebrand->delete();
        return redirect()->route('brands.view')->with('success','Brand Delete Successful');
    }
}
