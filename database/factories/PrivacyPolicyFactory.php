<?php

namespace Database\Factories;

use App\Models\PrivacyPolicy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrivacyPolicy>
 */
class PrivacyPolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PrivacyPolicy::class;
     
    public function definition()
    {
        return [
            'title'       => "Privacy Policy",
            'description' => $this->faker->paragraph(100),
        ];

    }
}
