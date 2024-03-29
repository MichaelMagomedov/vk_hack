<?php

namespace App\Clients\Models;

use App\Test\Models\Answer;
use App\Test\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Client extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'external_id',
        'photo',
        'university_name',
        'relation',
        'home_phone',
        'relative_id',
        'instagram',
        'facebook',
    ];

    public $timestamps = false;

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class, 'client_answers', 'client_id', 'answer_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'client_products', 'client_id', 'product_id');
    }
}
