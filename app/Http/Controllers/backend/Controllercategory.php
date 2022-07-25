<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Category;
use DB;
class Controllercategory extends Controller
{
   	public function view(){
    	$data['categorys'] = Category::All();
    	return view('backend.layouts.categorys.category-view', $data);
    }
    public function add(){
    	return view('backend.layouts.categorys.category-add');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name',
         ]);
    	$data = new Category();
    	$data->name = $request->name;
        $data->create_by = Auth::User()->id;
    	$data->save();
    	return redirect()->route('categorys.view')->with('success','Category insert successful');
    }
    public function edit($id){
        $categoryedit = Category::findorfail($id);
        return view('backend.layouts.categorys.category-edit',compact('categoryedit'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name',
         ]);
        $updatecategory = Category::findorfail($id);
       	$updatecategory->name = $request->name;
        $updatecategory->update_by = Auth::User()->id;
        $updatecategory->save();
        return redirect()->route('categorys.view')->with('success','Category update successful');
    }
     public function delete(Request $request){
        $deletecategory = Category::findorfail($request->id);
        $deletecategory->delete();
        return redirect()->route('categorys.view')->with('success','Category Delete Successful');
    }
}
