<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifySeller extends Model
{
    use HasFactory;

    protected $dates = [
        'updated_at',
        'created_at',
        'token_expires_at',
    ];

    protected $guarded = [];

    public function seler()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }
}
