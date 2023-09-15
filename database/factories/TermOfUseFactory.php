<?php

namespace Database\Factories;

use App\Models\TermOfUse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TermOfUse>
 */
class TermOfUseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TermOfUse::class;
    
    public function definition()
    {
        return [
            'title'       => "Term Of Use",
            'description' => $this->faker->paragraph(100),
        ];
    }
}
