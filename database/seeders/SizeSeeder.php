<?php

namespace Database\Seeders;

use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    private $sizes = ['S', 'M', 'L', 'XL','XXL'];

    public function run()
    {
        $items = [];
        foreach($this->sizes as $size){
            $data['name'] = $size;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $items[] = $data;
        }
        Size::insert($items);
    }
}
