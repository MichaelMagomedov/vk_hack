<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Test extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'img',
    ];

    public $timestamps = false;

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'test_id');
    }

    public function results(): HasMany
    {
        return $this->hasMany(TestResult::class, 'test_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TestCategory::class, 'category_id');
    }
}
