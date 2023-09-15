<?php

namespace App\Observers;

use App\Models\InnerCategory;
use App\Services\Admin\SlugService;

class InnerCategoryObserver
{
    // php artisan make:observer InnerCategoryObserver --model=InnerCategory

    protected $slugService;
    function __construct(SlugService $slugService){
        $this->slugService = $slugService;
    }

    public function created(InnerCategory $innerCategory)
    {
        $model = InnerCategory::class;
        $this->slugService->generateSlug($innerCategory, $model);
    }


    public function updated(InnerCategory $innerCategory)
    {
        $model = InnerCategory::class;
        $status = 'updated';
        $this->slugService->generateSlug($innerCategory, $model, $status);
    }

    
    public function deleted(InnerCategory $innerCategory)
    {
        $model = InnerCategory::class;
        $this->slugService->deleteSlug($innerCategory, $model);
    }

    
    public function restored(InnerCategory $innerCategory)
    {
        //
    }

    
    public function forceDeleted(InnerCategory $innerCategory)
    {
        //
    }
}
