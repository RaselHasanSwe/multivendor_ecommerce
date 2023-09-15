<?php
namespace App\Http\View\Composers;

use App\Models\Color;
use Illuminate\View\View;

class AllColorComposer {

    public function compose( View $view)
    {
        $g_all_colors = Color::all();
        //    dd($g_all_colors->toArray());
        $view->with('g_all_colors', $g_all_colors);
    }
}

