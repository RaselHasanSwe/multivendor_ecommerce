<?php

namespace Database\Factories;

use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $stateIds   = State::pluck('id')->toArray();
        $countryIds = Country::pluck('id')->toArray();

        return [
            'name'      => $this->faker->name(),
            'phone'     => $this->faker->phoneNumber,
            'mobile'    => $this->faker->phoneNumber,
            'city'      => $this->faker->city,
            'state_id'  => $stateIds[array_rand($stateIds)],
            'zip_code'  => $this->faker->postcode,
            'address'   => $this->faker->address,
            'email'     => $this->faker->unique()->email,
            'country_id' => $countryIds[array_rand($countryIds)],
            'email_verified_at' => now(),
            'password'  => bcrypt('password'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
