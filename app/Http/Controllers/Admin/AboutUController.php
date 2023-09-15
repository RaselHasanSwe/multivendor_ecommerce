<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use App\Models\Country;

class AboutUController extends Controller
{
    public function index()
    {
        $data['aboutus'] = AboutUs::first();
        return view('admin.pages.about-us', $data);
    }

    public function savePages( Request $request ) {

        $aboutUs = AboutUs::first();
        ($aboutUs) ? $aboutUs->update($request->all()) : AboutUs::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

}

