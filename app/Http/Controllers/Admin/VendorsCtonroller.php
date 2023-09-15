<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\VendorService;

class VendorsCtonroller extends Controller
{

    public function activeVendors(VendorService $vendor, Request $request )
    {
        if($request->ajax())
            return $vendor->vendors( $request, $activeVendor = 1 );
        return view('admin.active-vendors.index');
    }


    public function deactiveVendors(VendorService $vendor, Request $request )
    {
        if($request->ajax())
        return $vendor->vendors( $request, $deactiveVendor = 0 );
        return view('admin.deactive-vendors.index');
    }


    public function vendorStatus( Request $request){
        $vendor = Admin::findOrFail($request->id);
        $is_active = $vendor->is_active == 0 ? 1 : 0;
        $vendor->update(['is_active' => $is_active]);
        return response()->json(['success' => 'success', 'status' => $is_active]);
    }













    // public function saveFaq( FaqRequest $request)
    // {
    //    Admin::create($request->all());
    //     return redirect()->back()->with('success', 'Saved!');
    // }








}
