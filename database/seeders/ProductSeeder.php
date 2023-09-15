<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\InnerCategory;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSizeChart;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();
        $images = ['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg'];

        // for($i = 0; $i <= 50; $i++){
        //     $innerCategory = InnerCategory::with('subCategory', 'subCategory.category')->find($faker->numberBetween(1, 5));
        //     $innerCategoryId = $innerCategory->id;
        //     $subCategoryId = $innerCategory->subCategory['id'];
        //     $categoryId = $innerCategory->subCategory->category['id'];

        //     $product = new Product();
        //     $product->category_id = $categoryId;
        //     $product->sub_category_id = $subCategoryId;
        //     $product->inner_category_id = $innerCategoryId;
        //     $product->product_name = $faker->sentence(1);
        //     $product->price = $faker->numberBetween(100, 500);
        //     $product->stock = $faker->numberBetween(50, 500);
        //     $product->discount_percent = $faker->numberBetween(2, 20);
        //     $product->tax_percent = $faker->numberBetween(2, 10);
        //     $product->cover_image = $images[$faker->numberBetween(1, 4)];
        //     $product->short_description = $faker->sentence(2);
        //     $product->full_description = $faker->sentence(5);
        //     $product->size_measurement = $faker->sentence(5);
        //     $product->width = $faker->numberBetween(2, 10);
        //     $product->height = $faker->numberBetween(2, 10);
        //     $product->depth = $faker->numberBetween(2, 10);
        //     $product->weight = $faker->numberBetween(2, 10);
        //     $product->is_hidden = $faker->numberBetween(0, 1);
        //     $product->save();

        $innerCategories = InnerCategory::all();

        foreach ($innerCategories as  $innerCategory)
        {
            for ($i = 1; $i <= 5; $i++)
            {
                $product = new Product();
                $product->category_id = $innerCategory->category_id;
                $product->sub_category_id = $innerCategory->sub_category_id;
                $product->inner_category_id = $innerCategory->id;
                $product->seller_id = rand(2, 3);
                $product->product_name = $faker->sentence(1);
                $product->price = $faker->numberBetween(100, 500);
                $product->stock = $faker->numberBetween(50, 500);
                $product->discount_percent = $faker->numberBetween(2, 20);
                $product->tax_percent = $faker->numberBetween(2, 10);
                $product->cover_image = $images[$faker->numberBetween(1, 4)];
                $product->short_description = $faker->sentence(2);
                $product->full_description = $faker->sentence(5);
                $product->size_measurement = $faker->sentence(5);
                $product->width = $faker->numberBetween(2, 10);
                $product->height = $faker->numberBetween(2, 10);
                $product->depth = $faker->numberBetween(2, 10);
                $product->weight = $faker->numberBetween(2, 10);
                $product->is_hidden = $faker->numberBetween(0, 1);
                $product->save();

            }
            // Size
            $size = new ProductSize();
            $size->product_id = $product->id;
            $size->size_id = $faker->numberBetween(1, 5);
            $size->save();

            // Color
            $size = new ProductColor();
            $size->product_id = $product->id;
            $size->color_id = $faker->numberBetween(1, 10);
            $size->save();

            // Additional Image
            for($i = 0; $i <= 4; $i++){
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->color_id = $faker->numberBetween(1, 10);
                $productImage->image = $images[$faker->numberBetween(1, 4)];
                $productImage->save();
            }

            // Size Chart
            $sizeChart = new ProductSizeChart();
            $sizeChart->product_id = $product->id;
            $sizeChart->col_1 = $faker->numberBetween(1, 10);
            $sizeChart->col_2 = $faker->numberBetween(1, 10);
            $sizeChart->col_3 = $faker->numberBetween(1, 10);
            $sizeChart->col_4 = $faker->numberBetween(1, 10);
            $sizeChart->col_5 = $faker->numberBetween(1, 10);
            $sizeChart->col_6 = $faker->numberBetween(1, 10);
            $sizeChart->col_7 = $faker->numberBetween(1, 10);
            $sizeChart->col_8 = $faker->numberBetween(1, 10);
            $sizeChart->save();
        }
        // }
    }
}

