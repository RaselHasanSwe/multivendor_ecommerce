<?php

namespace Database\Seeders;

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    private $jsonPath = 'json/countryAndState.json';

    public function run()
    {

        
        $jsonData       = file_exists(public_path($this->jsonPath)) ? file_get_contents(public_path($this->jsonPath)) : [];
        $countryData    = json_decode($jsonData);
        $countries  = [];

        if(count($countryData->countries)){
            foreach($countryData->countries as $country){
                $countryItem['name'] = $country->country;
                $countryItem['created_at'] = Carbon::now();
                $countryItem['updated_at'] = Carbon::now();
                $countries[] = $countryItem;
            }
        }

        Country::insert($countries);
    }
}
