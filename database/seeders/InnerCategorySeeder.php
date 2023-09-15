<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\InnerCategory;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InnerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $subcategories = SubCategory::take(40)->get();
        foreach ($subcategories as $subcategory) {
            for($i = 1; $i <= 4; $i++){
                $innercategory = new InnerCategory();
                $innercategory->category_id     = $subcategory->category_id;
                $innercategory->sub_category_id = $subcategory->id;
                $innercategory->name            = $faker->sentence(1);
                $innercategory->save();
            }
        }
    }
}
