<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\CustomerList;

class CustomerController extends Controller
{
    public function customers(CustomerList $customer, Request $request )
    {
        if($request->ajax())
        
        return $customer->customers( $request );
        return view('admin.customers.index');
    }

}
