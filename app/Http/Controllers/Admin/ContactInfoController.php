<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Http\Controllers\Controller;

class ContactInfoController extends Controller
{
    public function index()
    {
        $data['contactInfo'] = ContactInfo::first();
        return view('admin.pages.contact-info', $data);
    }

    public function savePages( Request $request ) {

        $contactInfo = ContactInfo::first();
        ($contactInfo) ? $contactInfo->update($request->all()) : ContactInfo::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

}