<?php

namespace Database\Factories;

use App\Models\Freeshipping;
use App\Models\GroceryShippingArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Freeshipping>
 */
class FreeshippingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Freeshipping::class;

    public function definition()
    {
        return [
            'amount'        => 1,
            'shipping_name' => 'Express shipping',
            'delivery_time' => '8 - 10 days',
            'zip_code'      => $this->faker->postcode,
        ];
    }
}
