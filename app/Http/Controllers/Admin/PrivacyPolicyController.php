<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $data['privacyPolicy'] = PrivacyPolicy::first();
        return view('admin.pages.privacy-policy', $data);
    }

    public function savePages( Request $request ) {

        $privacyPolicy = PrivacyPolicy::first();
        ($privacyPolicy) ? $privacyPolicy->update($request->all()) : PrivacyPolicy::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

}
