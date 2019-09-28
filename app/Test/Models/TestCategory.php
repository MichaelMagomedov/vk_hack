<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;

final class TestCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

}
