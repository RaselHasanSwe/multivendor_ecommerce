<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Slider::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(10),
            'button_name' => "Read More",
            'url' => $this->faker->url(),
            'show_button' => $this->faker->numberBetween(0, 1),
            'status' => $this->faker->numberBetween(0, 1)
        ];
    }
}
