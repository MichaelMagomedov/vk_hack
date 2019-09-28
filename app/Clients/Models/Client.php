<?php

namespace App\Clients\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'external_id',
        'photo',
        'university_name',
        'relation',
        'mobile_phone',
        'home_phone',
        'relative_id',
        'instagram',
    ];

    public $timestamps = false;
}
