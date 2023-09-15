<?php

namespace Database\Seeders;

use App\Models\State;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    private $jsonPath = 'json/countryAndState.json';

    public function run() {
        $jsonData       = file_exists(public_path($this->jsonPath)) ? file_get_contents(public_path($this->jsonPath)) : [];
        $countryData    = json_decode($jsonData);
        $country_id     = 1;
        $states         = [];

        if(count($countryData->countries)){
            foreach($countryData->countries as $country){
                $countryItem = [];
                if(count($country->states)){
                    foreach($country->states as $state){
                        $countryItem['name'] = $state;
                        $countryItem['country_id'] = $country_id;
                        $countryItem['created_at'] = Carbon::now();
                        $countryItem['updated_at'] = Carbon::now();
                    }
                }
                if(count($countryItem)) $states[] = $countryItem;
                $country_id++;
            }
        }

        State::insert($states);
    }
}
