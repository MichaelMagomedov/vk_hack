<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class TestResult extends Model
{
    protected $fillable = [
        'text',
        'img',
        'from',
        'to',
        'test_id',
    ];

    public $timestamps = false;

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
