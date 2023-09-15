<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function create(Request $request)
    {
        if(!Auth::check()) return response()->json(['url' => route('login') ]);

        $is_exist = Wishlist::where('product_id',$request->id)
                            ->where('user_id',auth()->user()->id)
                            ->first();

        if($is_exist) return response()->json(['exist' => 'Already added your wishlist!']);

        Wishlist::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->id
        ]);
        return response()->json(['success' => 'Added successfully!!!']);
    }

    public function index()
    {
        $data['wishlist_products'] = Wishlist::where('user_id',auth()->user()->id)
                                            ->with('product','product.images')
                                            ->paginate(15);
        return view('frontend.pages.wishlist',$data);

    }

    public function delete(Request $request)
    {
        Wishlist::findOrFail($request->id)->delete();
        return response()->json(['success' => 'Remove successfully!!!']);

    }
}
