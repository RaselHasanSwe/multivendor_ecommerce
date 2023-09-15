<?php

namespace Database\Factories;

use App\Models\Color;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
 */
class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Color::class;

    public function definition()
    {
        return [
            'name' => $this->faker->safeColorName(),
        ];
    }
}

