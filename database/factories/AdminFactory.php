<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Admin::class;

    public function definition()
    {
        $adminMail = 'admin@gmail.com';
        $adminPass = bcrypt('password');

        $stateIds   = State::pluck('id')->toArray();
        $countryIds = Country::pluck('id')->toArray();

        return [
            'name'              => $this->faker->name,
            'store_name'        => $this->faker->company,
            'phone'             => $this->faker->phoneNumber,
            'mobile'            => $this->faker->phoneNumber,
            'address'           => $this->faker->address,
            'city'              => $this->faker->city,
            'state_id'          => $stateIds[array_rand($stateIds)],
            'zip_code'          => $this->faker->postcode,
            'country_id'        => $countryIds[array_rand($countryIds)],
            'username'          => $this->faker->userName,
            'email'             => $this->faker->unique()->email,
            'password'          => bcrypt('password'), // password
            'is_seller'         => 1,
            'is_active'         => 1,
            'remember_token'    => Str::random(10),
        ];
    }
}
