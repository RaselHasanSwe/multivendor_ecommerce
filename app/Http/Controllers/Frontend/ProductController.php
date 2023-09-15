<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\ProductService;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    protected $productService;

    function __construct(ProductService $productService){

        $this->productService = $productService;
    }

    public function products( $category, $subCategory = null, $innerCategory = null )
    {
        $data['category']       = $category;
        $data['sub_category']   = $subCategory;
        $data['inner_category'] = $innerCategory;

        //Cart::destroy();


        //dd(Cart::content());
        $items = $this->productService->product($data);
        //dd($items);
        $view = 'frontend.products.product-list';
        if($items['is_product'] === true) $view = 'frontend.product-details.index';
        return view($view, $items);

    }

    public function priceWiseProduct(Request $request)
    {
        dd($request->all());
    }
}
