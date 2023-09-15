<?php

namespace App\Http\Controllers\Admin;

use App\Models\Freeshipping;
use Illuminate\Http\Request;
use App\Models\GroceryShippingArea;
use App\Http\Controllers\Controller;
use App\Models\ShippingPriceBetween;

class ShippingController extends Controller
{

    public function index()
    {
        $data['freeShipping'] = Freeshipping::first();
        $data['shippingPriceBetween'] = ShippingPriceBetween::first();
        $data['groceryShipping'] = GroceryShippingArea::first();
        return view('admin.shipping-method.index', $data);
    }

    public function freeShipping( $request )
    {
        $data = $request->all();
        $data['status'] = $request->status ? true : false;
        $freeshipping = Freeshipping::first();
        ($freeshipping) ? $freeshipping->update($data) : Freeshipping::create($data);
    }

    public function shippingPriceBetween($request)
    {
        $shippingPriceBetween = ShippingPriceBetween::first();
        ($shippingPriceBetween) ? $shippingPriceBetween->update($request->all()) : ShippingPriceBetween::create($request->all());
    }

    public function groceryShipping($request)
    {
        $groceryShipping = GroceryShippingArea::first();
        ($groceryShipping) ? $groceryShipping->update($request->all()) : GroceryShippingArea::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }


    public function saveShipping( Request $request, $shippingStatus)
    {
        ($shippingStatus == 'freeShipping') ? $this->freeShipping($request) : (($shippingStatus == 'shippingPriceBetween')  ? $this->shippingPriceBetween( $request ) : $this->groceryShipping( $request ));

        return redirect()->back()->with('success', 'Saved!');
    }

}
