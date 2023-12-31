<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model {
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = ['name', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


    public function innerCategories(){
        return $this->hasMany(InnerCategory::class,'sub_category_id','id');
    }

    public function slug(){
        return $this->hasOne(Slug::class,"origin_id")->where('origin_type', '=', static::class);
    }
}
