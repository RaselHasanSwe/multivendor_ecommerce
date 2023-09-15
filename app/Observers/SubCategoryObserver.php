<?php

namespace App\Observers;

use App\Models\SubCategory;
use App\Services\Admin\SlugService;

class SubCategoryObserver
{
    //php artisan make:observer SubCategoryObserver --model=SubCategory
    
    protected $slugService;
    function __construct(SlugService $slugService){
        $this->slugService = $slugService;
    }
    
    public function created(SubCategory $subCategory)
    {
        $model = SubCategory::class;
        $this->slugService->generateSlug($subCategory, $model);
    }

    
    public function updated(SubCategory $subCategory)
    {
        $model = SubCategory::class;
        $status = 'updated';
        $this->slugService->generateSlug($subCategory, $model, $status);
    }

    
    public function deleted(SubCategory $subCategory)
    {
        $model = SubCategory::class;
        $this->slugService->deleteSlug($subCategory, $model);
    }

    
    public function restored(SubCategory $subCategory)
    {
        //
    }

    
    public function forceDeleted(SubCategory $subCategory)
    {
        //
    }
}
