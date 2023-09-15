<?php
namespace App\Helpers;

class Product {

    public static function discount($product)
    {
        $discount_price = $product->discount_percent ? ($product->price - ($product->price * $product->discount_percent) / 100 ) : $product->price;
        return $discount_price;
    }

    public static function tax( $product )
    {
        if($product->tax_percent){
            $price = self::discount($product);
            return ($price * $product->tax_percent) / 100;
        }
        return 0;
    }
}
