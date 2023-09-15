<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $categories = Category::take(10)->get();
        foreach ($categories as  $category) {
            for($i = 1; $i <= 4; $i++){
                $subcategory = new SubCategory();
                $subcategory->category_id = $category->id;
                $subcategory->name        = $faker->sentence(1);
                $subcategory->hide_product_from_home= rand(0,1);
                $subcategory->save();
            }
        }
    }
}
