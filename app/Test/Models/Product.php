<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;

final class Product extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'url',
        'img',
    ];

    public $timestamps = false;
}
