<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RefundPolicy;
use App\Http\Controllers\Controller;

class RefundReturnPolicyController extends Controller
{
    public function index()
    {
        $data['privacyPolicy'] = RefundPolicy::first();
        return view('admin.pages.refund-return', $data);
    }

    public function savePages( Request $request ) {

        $privacyPolicy = RefundPolicy::first();
        ($privacyPolicy) ? $privacyPolicy->update($request->all()) : RefundPolicy::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

}
