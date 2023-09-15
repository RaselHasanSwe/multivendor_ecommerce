<?php

namespace Database\Factories;

use App\Models\ShippingPriceBetween;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingPriceBetween>
 */
class ShippingPriceBetweenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ShippingPriceBetween::class;

    public function definition()
    {
        return [
            'amount_lte_10'        => 10,
            'amount_lte_20'        => 20,
            'amount_lte_30'        => 30,
            'amount_lte_40'        => 40,
            'amount_lte_50'        => 50,
        ];
    }
}
