<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Answer extends Model
{
    protected $fillable = [
        'text',
        'question_id',
        'rate',
        'next_question_id',
    ];

    public $timestamps = false;

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function nextQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'next_question_id');
    }


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'answer_products', 'answer_id', 'product_id');
    }
}
