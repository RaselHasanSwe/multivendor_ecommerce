<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;
use App\Services\Admin\CouponService;

class CouponController extends Controller
{
    public function createCoupon()
    {
        return view('admin.coupon.create');
    }

    public function saveCoupon( CouponRequest $request)
    {
        Coupon::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

    public function index(CouponService $coupon, Request $request )
    {
        if($request->ajax())
        return $coupon->coupons( $request );
        return view('admin.coupon.index');
    }

    public function delete( Request $request )
    {
        Coupon::find($request->id)->delete();
        return response()->json(['success' => 'success']);
    }

    public function edit( Request $request )
    {
        $data['coupon']  = Coupon::findOrFail( $request->id );
        return view('admin.coupon.edit-modal', $data);
    }

    public function update( Request $request){
        Coupon::findOrFail($request->id)->update($request->all());
        return response()->json(['success' => 'success']);
    }
}
