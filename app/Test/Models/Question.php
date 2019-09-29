<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Question extends Model
{
    protected $fillable = [
        'test_id',
        'product_id',
        'img',
        'text',
        'is_first',
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
}
