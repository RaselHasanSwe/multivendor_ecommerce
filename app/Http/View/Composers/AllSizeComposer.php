<?php
namespace App\Http\View\Composers;

use App\Models\Size;
use Illuminate\View\View;

class AllSizeComposer {

    public function compose( View $view)
    {
        $g_all_sizes = Size::all();
        //    dd($g_all_sizes->toArray());
        $view->with('g_all_sizes', $g_all_sizes);
    }
}

