<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ContactInfo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactInfo>
 */
class ContactInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ContactInfo::class;
    
    public function definition()
    {
        return [
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12090.924231342191!2d-73.889234!3d40.745943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f00a7a4e21b%3A0xd947899c183ab459!2s40-37%2076th%20St%2C%20Queens%2C%20NY%2011373!5e0!3m2!1sen!2sus!4v1664194154016!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'working_hour'  => "<p>Mon-Tue-Thu : 10 am – 4 pm</p><p>Wed-Fri : 4 pm – 8 pm</p><p>Sunday : Lab Work</p>",
            'address'       => $this->faker->address,
            'phone'         => $this->faker->phoneNumber,
            'email'         => $this->faker->unique()->email,
            'fb'            => "https://www.facebook.com",
            'twitter'       => "https://www.twitter.com",
            'youtube'       => "https://www.youtube.com",
        ];
    }
}
