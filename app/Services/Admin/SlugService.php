<?php
namespace App\Services\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\InnerCategory;
use App\Models\Slug;
use Illuminate\Support\Str;

class SlugService {

    public function generateSlug($category, $model, $status = null)
    {
        // Slug Existance
        $cSlug = Str::slug($category->name);
        $q = Slug::where('slug', 'LIKE', '%'.$cSlug.'%' )
                   ->where('origin_type', $model);
        if($status != null && $status == 'updated'){
            $thisSlug = Slug::where('origin_id', $category->id)->where('origin_type', $model)->first();
            $q->whereNotIn('id', [$thisSlug->id]);
        }
        $slugExistance = $q->get();
        if(count($slugExistance) > 0){
            $cSlug = $cSlug . '-' . count($slugExistance)+1;
        }else{
            $cSlug = $cSlug;
        }

        // Find Slug By Id & Type
        $slug = Slug::whereOriginId($category->id)->whereOriginType($model)->first();
        if(!$slug){
            $slug = new Slug;
        }
        $slug->origin_type = $model;
        $slug->origin_id = $category->id;
        $slug->slug = $cSlug;
        $slug->save();

        return true;
    }


    public function deleteSlug($category, $model)
    {
        
        if($model == 'App\Models\Category'){
            $subCats = SubCategory::get();
            $subCats = array_column($subCats->toArray(), 'id');
            Slug::whereNotIn('origin_id', $subCats)->whereOriginType(SubCategory::class)->delete();

            $innerCats = InnerCategory::get();
            $innerCats = array_column($innerCats->toArray(), 'id');
            Slug::whereNotIn('origin_id', $innerCats)->whereOriginType(InnerCategory::class)->delete();
        }

        if($model == 'App\Models\SubCategory'){
            $innerCats = InnerCategory::get();
            $innerCats = array_column($innerCats->toArray(), 'id');
            Slug::whereNotIn('origin_id', $innerCats)->whereOriginType(InnerCategory::class)->delete();
        }

        $slug = Slug::whereOriginId($category->id)->whereOriginType($model)->delete();

    }

}
