<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 1; $i <=10; $i++){
            $category = new Category();
            $category->name                                = $faker->sentence(1);
            $category->position                            = $i;
            $category->icon                                = $faker->name();
            $category->show_product_by_subcategory_in_home = rand(0,1);
            $category->only_express_shipping               = rand(0,1);
            $category->hide_category_from_home             = rand(0,1);
            $category->show_filter                         = rand(0,1);
            $category->save();
        }
    }
}
