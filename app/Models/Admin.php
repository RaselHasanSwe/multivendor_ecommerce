<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminresetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name','store_name', 'store_social_link','phone','mobile','address','city','state_id','zip_code','country','email','username', 'password','is_seller','is_active', 'verified'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminresetPasswordNotification($token));
    }

    public function verifySeller()
    {
        return $this->hasOne(VerifySeller::class, 'admin_id', 'id');
    }

}
