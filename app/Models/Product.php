<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['slug', 'category', 'subCategory', 'innerCategory', 'colors', 'colors.color', 'sizes', 'sizes.size', 'images', 'sizeCharts','seller'];

    public function slug()
    {
        return $this->hasOne(Slug::class,"origin_id")->where('origin_type', '=', static::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function innerCategory()
    {
        return $this->belongsTo(InnerCategory::class, 'inner_category_id', 'id');
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function sizeCharts()
    {
        return $this->hasMany(ProductSizeChart::class, 'product_id');
    }

    public function seller()
    {
        return $this->belongsTo(Admin::class, 'seller_id', 'id');
    }
}
