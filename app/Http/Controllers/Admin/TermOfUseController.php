<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TermOfUse;
use App\Http\Controllers\Controller;

class TermOfUseController extends Controller
{
    public function index()
    {
        $data['userOfTerm'] = TermOfUse::first();
        return view('admin.pages.useof-terms', $data);
    }

    public function savePages( Request $request ) {
        $userOfTerm = TermOfUse::first();
        ($userOfTerm) ? $userOfTerm->update($request->all()) : TermOfUse::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

}
