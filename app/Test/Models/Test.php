<?php

namespace App\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Test extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'img'
    ];

    public $timestamps = false;

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'test_id');
    }
}
