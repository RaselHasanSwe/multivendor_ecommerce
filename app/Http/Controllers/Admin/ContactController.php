<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Services\Admin\ContactService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    
    
        public function viewContact( ContactRequest $request)
        {
            Contact::create($request->all());
            return redirect()->back()->with('success', 'Saved!');
        }
    
        public function index(ContactService $contact, Request $request )
        {
            if($request->ajax())
            return $contact->contacts( $request );
            return view('admin.contact.index');
        }
    
        public function deleteContact( Request $request )
        {
            Contact::find($request->id)->delete();
            return response()->json(['success' => 'success']);
        }
    
    
    
}
