<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillingRequest;
use App\Models\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function index()
    {
        return view('frontend.billing.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['user_id' => Auth::user()->id]);
        if(Auth::check()){
            $is_exist = Billing::where('user_id',Auth::user()->id)->first();
            $is_exist ? Billing::find($is_exist->id)->fill($request->all())->save() :  Billing::create($request->all()) ;
        }
        return redirect()->back()->with('success','Address saved successfully!');
    }
}
