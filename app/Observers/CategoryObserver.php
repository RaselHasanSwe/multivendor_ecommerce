<?php

namespace App\Observers;

use App\Models\Category;
use App\Services\Admin\SlugService;

class CategoryObserver
{
    // php artisan make:observer CategoryObserver --model=Category

    protected $slugService;
    function __construct(SlugService $slugService){
        $this->slugService = $slugService;
    }
    
    public function created(Category $category)
    {
        $model = Category::class;
        $this->slugService->generateSlug($category, $model);
    }

    
    public function updated(Category $category)
    {
        $model = Category::class;
        $status = 'updated';
        $this->slugService->generateSlug($category, $model, $status);
    }

    
    public function deleted(Category $category)
    {
        $model = Category::class;
        $this->slugService->deleteSlug($category, $model);
    }

    
    public function restored(Category $category)
    {
        //
    }

    
    public function forceDeleted(Category $category)
    {
        //
    }
}
