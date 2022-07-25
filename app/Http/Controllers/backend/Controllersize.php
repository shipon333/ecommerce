<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Size;
use DB;
class Controllersize extends Controller
{
     public function view(){
    	$data['sizes'] = Size::All();
    	return view('backend.layouts.sizes.sizes-view', $data);
    }
    public function add(){
    	return view('backend.layouts.sizes.size-add');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:sizes,name',
         ]);
    	$data = new Size();
    	$data->name = $request->name;
        $data->create_by = Auth::User()->id;
    	$data->save();
    	return redirect()->route('sizes.view')->with('success','Size insert successful');
    }
    public function edit($id){
        $sizeedit = Size::findorfail($id);
        return view('backend.layouts.sizes.size-edit',compact('sizeedit'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:sizes,name',
         ]);
        $updatesize = Size::findorfail($id);
       	$updatesize->name = $request->name;
        $updatesize->update_by = Auth::User()->id;
        $updatesize->save();
        return redirect()->route('sizes.view')->with('success','Size update successful');
    }
     public function delete(Request $request){
        $deletesize = Size::findorfail($request->id);
        $deletesize->delete();
        return redirect()->route('sizes.view')->with('success','Size Delete Successful');
    }
}
