<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Faq;


use App\Models\User;
use App\Models\Admin;
use App\Models\Color;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\TermOfUse;
use App\Models\ContactInfo;
use App\Models\SubCategory;
use App\Models\Freeshipping;
use App\Models\RefundPolicy;
use App\Models\InnerCategory;
use App\Models\PrivacyPolicy;
use Illuminate\Database\Seeder;
use Database\Seeders\SizeSeeder;
use App\Models\GroceryShippingArea;
use Database\Seeders\ProductSeeder;
use App\Models\ShippingPriceBetween;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::whereEmail('admin@gmail.com')->first();
        if(!$admin) Admin::create(['name' => 'Admin', 'email' => 'admin@gmail.com', 'is_seller' => 1, 'password' => bcrypt('password')]);
        Admin::create(['name' => 'Seller 1', 'email' => 'seller1@gmail.com', 'is_seller' => 0, 'password' => bcrypt('password')]);
        Admin::create(['name' => 'Seller 2', 'email' => 'seller2@gmail.com', 'is_seller' => 0, 'password' => bcrypt('password')]);

        Faq::factory(30)->create();
        Color::factory(10)->create();
        // Category::factory()->create();
        AboutUs::factory(1)->create();
        TermOfUse::factory(1)->create();
        // SubCategory::factory()->create();
        ContactInfo::factory(1)->create();
        RefundPolicy::factory(1)->create();
        PrivacyPolicy::factory(1)->create();
        Slider::factory(10)->create();

        // InnerCategory::factory(30)->create();

        // InnerCategory::factory(30)->create();
        Freeshipping::factory(1)->create();
        ShippingPriceBetween::factory(1)->create();
        GroceryShippingArea::factory(1)->create();

        $this->call([
            SizeSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            InnerCategorySeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            ProductSeeder::class,
        ]);

        User::factory(30)->create();
        Admin::factory(50)->create();


    }
}
