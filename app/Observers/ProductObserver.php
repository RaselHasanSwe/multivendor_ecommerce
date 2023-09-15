<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\Admin\SlugService;

class ProductObserver
{
    //php artisan make:observer ProductObserver --model=Product
    protected $slugService;
    function __construct(SlugService $slugService){
        $this->slugService = $slugService;
    }

    public function created(Product $product)
    {
        $model = Product::class;
        $product['name'] = $product['product_name'];
        $this->slugService->generateSlug($product, $model);
    }

    
    public function updated(Product $product)
    {
        $model = Product::class;
        $product['name'] = $product['product_name'];
        $status = 'updated';
        $this->slugService->generateSlug($product, $model, $status);
    }

    
    public function deleted(Product $product)
    {
        $model = Product::class;
        $this->slugService->deleteSlug($product, $model);
    }

    
    public function restored(Product $product)
    {
        //
    }

    
    public function forceDeleted(Product $product)
    {
        //
    }
}
