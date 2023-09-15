<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Frontend\CartService;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index()
    {
        return view('frontend.cart.index');
    }
    public function addToCart(CartService $cart, Request $request )
    {
        $cart->addCart( $request );
    }

    public function updateCart( Request $request )
    {
        Cart::update($request->rowID, $request->quantity);
        return response()->json(['success' => 'success']);
    }

    public function deleteCartItem(Request $request)
    {
        Cart::remove($request->id);
        return response()->json(['success' => 'success']);
    }

    public function destroy()
    {
        Cart::destroy();
        return response()->json(['success' => 'success']);
    }



}
