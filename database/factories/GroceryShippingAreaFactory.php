<?php

namespace Database\Factories;

use App\Models\GroceryShippingArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroceryShippingArea>
 */
class GroceryShippingAreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = GroceryShippingArea::class;

    public function definition()
    {
        return [
            'zipcodes'      => $this->faker->postcode,
        ];
    }
}
