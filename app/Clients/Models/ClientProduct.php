<?php

namespace App\Clients\Models;

use Illuminate\Database\Eloquent\Model;

final class ClientProduct extends Model
{
    protected $fillable = [
        'client_id',
        'product_id',
        'created_at',
    ];

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
