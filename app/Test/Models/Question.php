<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\Types\Static_;

class Question extends Model
{
    protected $fillable = [
        'test_id',
        'parent_id',
        'product_id',
        'img',
        'text',
        'type',
    ];

    public $timestamps = false;

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function parentQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'parent_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'question_products', 'question_id', 'product_id');
    }
}
