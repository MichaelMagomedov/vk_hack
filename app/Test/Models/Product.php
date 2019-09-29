<?php

namespace App\Test\Models;

use App\Clients\Models\Client;
use App\Clients\Models\ClientProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Product extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'url',
        'img',
    ];

    public $timestamps = false;

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class, 'answer_products', 'product_id', 'answer_id');
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'client_products', 'product_id', 'client_id');
    }

    public function clientProducts()
    {
        return $this->hasMany(ClientProduct::class, 'product_id');
    }
}
