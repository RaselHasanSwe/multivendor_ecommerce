<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPriceBetween extends Model
{
    use HasFactory;

    protected $fillable = ['amount_lte_10', 'amount_lte_20', 'amount_lte_30', 'amount_lte_40', 'amount_lte_50'];
}
