<?php

namespace Database\Factories;

use App\Models\AboutUs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutUs>
 */
class AboutUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AboutUs::class;

    public function definition()
    {
        return [
            'title'        => 'About Us',
            'description' => $this->faker->paragraph(100),
        ];
    }
}
