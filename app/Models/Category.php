<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'icon',
        'show_product_by_subcategory_in_home',
        'only_express_shipping',
        'hide_category_from_home',
        'show_filter'
    ];

    public function subCategories() {
        return $this->hasMany(SubCategory::class, "category_id", "id");
    }

    public function slug(){
        return $this->hasOne(Slug::class,"origin_id")->where('origin_type', '=', static::class);
    }
}
