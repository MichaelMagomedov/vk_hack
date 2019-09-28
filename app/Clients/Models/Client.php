<?php

namespace App\Clients\Models;

use App\Root\Utils\Traits\InsertOnDuplicate;
use Illuminate\Database\Eloquent\Model;

final class Client extends Model
{
    use InsertOnDuplicate;

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
}
