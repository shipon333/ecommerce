<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Contact;
use App\Model\Communicate;
use DB;
class ControllerContacts extends Controller
{
   public function view(){
    	$data['contacts'] = Contact::All();
    	$data['countcontact']= Contact::count();
    	return view('backend.layouts.contacts.contacts-view', $data);
    }
    public function add(){
    	return view('backend.layouts.contacts.contacts-add');
    }
    public function store(Request $request){
        
    	$data = new Contact();
    	$data->address = $request->address;
    	$data->mobile = $request->mobile;
    	$data->email = $request->email;
    	$data->facebook = $request->facebook;
    	$data->twiteer = $request->twitter;
    	$data->google_plus = $request->google;
    	$data->youtube = $request->youtube;
    	$data->save();
    	return redirect()->route('contacts.view')->with('success','Contact insert successful');
    }
    public function edit($id){
        $contactedit = Contact::findorfail($id);
        return view('backend.layouts.contacts.contacts-edit',compact('contactedit'));
    }
    public function update(Request $request, $id){
        
        $updatecontact = Contact::findorfail($id);
        $updatecontact->address = $request->address;
       	$updatecontact->mobile = $request->mobile;
    	$updatecontact->email = $request->email;
    	$updatecontact->facebook = $request->facebook;
    	$updatecontact->twiteer = $request->twitter;
    	$updatecontact->google_plus = $request->google;
    	$updatecontact->youtube = $request->youtube;
        $updatecontact->save();
        return redirect()->route('contacts.view')->with('success','Contact update successful');
    }
     public function delete(Request $request){
        $deletecontact = Contact::findorfail($request->id);
        $deletecontact->delete();
        return redirect()->route('contacts.view')->with('success','Contact Delete Successful');
    }

    public function communicateview(){
        $data['communicates'] = Communicate::All();
        return view('backend.layouts.communicates.communicats-view', $data);
    }
    public function communicatedelete(Request $request){
        $deletecommunicate = Communicate::findorfail($request->id);
        $deletecommunicate->delete();
        return redirect()->route('communicate.view')->with('success','Contact Delete Successful');
    }
}
