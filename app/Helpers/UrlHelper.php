<?php
namespace App\Helpers;

class UrlHelper {

    public static function url($category, $sub_category = null, $inner_category = null)
    {
        $data = $category->slug->slug;
        if($sub_category)
            $data .= '/'.$sub_category->slug->slug;
        if($inner_category)
            $data .= '/'.$inner_category->slug->slug;

        return url($data);
    }
}
