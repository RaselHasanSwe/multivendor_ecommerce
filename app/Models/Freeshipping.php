<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freeshipping extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'shipping_name', 'delivery_time', 'zip_code', 'status'];
}
