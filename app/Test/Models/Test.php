<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'img'
    ];

    public $timestamps = false;

}
