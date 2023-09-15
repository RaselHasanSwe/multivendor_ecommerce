<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['favicon','logo','banner','banner_title', 'banner_sort_descriptions','admin_id', 'twitter', 'facebook', 'pinterest', 'linkedin', 'phone_1st', 'phone_2nd', 'email_1st', 'email_2nd', 'working_hour', 'location','map'];
}
