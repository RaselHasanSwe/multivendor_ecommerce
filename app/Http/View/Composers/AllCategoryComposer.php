<?php
namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class AllCategoryComposer {

    public function compose( View $view)
    {
        $g_all_categories = Category::orderBy('id','desc')
            ->with(
                'slug',
                'subCategories',
                'subCategories.slug',
                'subCategories.innerCategories',
                'subCategories.innerCategories.slug'
            )->orderBy('id','ASC')
            ->get();

        //    dd($g_all_categories->toArray());
        $view->with('g_all_categories', $g_all_categories);
    }
}

