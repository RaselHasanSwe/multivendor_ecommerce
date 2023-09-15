<?php

namespace Database\Factories;

use App\Models\RefundPolicy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefundPolicy>
 */
class RefundPolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RefundPolicy::class;
    
    public function definition()
    {
        return [
            'title'       => 'Refund & Return Policy',
            'description' => $this->faker->paragraph(100),
        ];
    }
}
