<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InnerCategory extends Model {

    use HasFactory;

    protected $table = 'inner_categories';
    protected $fillable = ['category_id','sub_category_id','name'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function slug(){
        return $this->hasOne(Slug::class,"origin_id")->where('origin_type', '=', static::class);
    }
}
