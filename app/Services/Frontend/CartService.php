<?php
namespace App\Services\Frontend;

use App\Models\Product;
use App\Helpers\Product as ProductHelper;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartService {

    public static function addCart( Request $request)
    {
        //Cart::destroy();
        $product = Product::findOrFail($request->product_id);
        $size_id = $request->size;
        $color_id = $request->color;

        $sizeName = ($size_id) ? Size::findOrFail($size_id)->first()->name : '';
        $colorName = ($color_id) ? Color::where('id', $color_id)->first()->name : '';

        $colorImage = '';
        if($color_id){
            foreach($product->images as $image){
                if($image->color_id == $color_id){
                    $colorImage = $image->image;
                    break;
                }
            }
        }

        $item = [
            'id' => $request->product_id,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price'=> ProductHelper::discount($product),
            'weight'=> 0,
            'options' => [
                'seller' => $request->seller_id,
                'slug' => $product->slug->slug,
                'image'=>$product->cover_image,
                'color_image'=> $colorImage,
                'size' => $sizeName,
                'color'=> $colorName,
                'size_id' => $size_id,
                'color_id' => $color_id,
                'tax' => ProductHelper::tax($product),
                'shipping'=> 0
            ]
        ];
        Cart::add($item);
    }


    public function cartTotal()
    {
        $total = 0;
        foreach(Cart::content() as $item){
            $price = $item->price * $item->qty;
            $tax = ($item->tax) ? $price * $item->tax / 100 : 0;
            $shipping = ($item->shipping) ? $item->shipping : 0;
            $total += $price + $tax + $shipping;

        }
        return $total;
    }
}
