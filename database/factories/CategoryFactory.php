<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'                                => fake()->name(),
            'position'                            => rand(0,100),
            'icon'                                => fake()->name(),
            'show_product_by_subcategory_in_home' => rand(0,1),
            'only_express_shipping'               => rand(0,1),
            'hide_category_from_home'             => rand(0,1),
            'show_filter'                         => rand(0,1),
        ];
    }
}
