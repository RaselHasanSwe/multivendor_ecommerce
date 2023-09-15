<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'billing_id',
        'order_id',
        'seller_id',
        'total'
    ];

    public function orderedProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function vendor()
    {
        return $this->belongsTo(Admin::class,'seller_id');
    }
}
