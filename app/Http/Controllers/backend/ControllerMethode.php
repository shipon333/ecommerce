<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Size;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\PaymentMethod;
use App\Model\Methode;
use App\Requests\ProductRequest;

use Auth;
use DB;
class ControllerMethode extends Controller
{
     public function view(){
        $data['alldata'] = Methode::All();
        return view('backend.layouts.payments.methode-view', $data);
    }
    public function add(){
        return view('backend.layouts.payments.methode-add');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
         ]);      
        $data = new Methode();
        $data->name = $request->name;
        $data->save(); 
        return redirect()->route('methods.view')->with('success','Method insert successful');
    }
    public function edit($id){
        $data['editmethode'] = Methode::find($id);
        return view('backend.layouts.payments.methode-edit',$data);
    }

    public function update(Request $request, $id){
        
        $updatemethode = Methode::findorfail($id);
        $updatemethode->name = $request->name;
    	$updatemethode->save();
        return redirect()->route('methods.view')->with('success','Methode update successful');
    }
     public function delete(Request $request){
        $methode = Methode::find($request->id);
        $methode->delete();
        return redirect()->route('methods.view')->with('success','Methode Delete successful');
    }
}
