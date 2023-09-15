<?php
namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer {

    public function compose( View $view)
    {
        $categories = Category::orderBy('id','desc')
            ->with(
                'slug',
                'subCategories',
                'subCategories.slug',
                'subCategories.innerCategories',
                'subCategories.innerCategories.slug'
            )->orderBy('id','ASC')
            ->take(5)
            ->get();

           //dd($categories->toArray());
        $view->with('g_categories', $categories);
    }
}

