<?php

namespace App\Test\Repositories;

use App\Test\Models\Answer;
use Illuminate\Database\Eloquent\Collection;

final class AnswerRepository
{

    public final function findByIds(array $ids): Collection
    {
        return Answer::query()->whereIn('id', $ids)->get();
    }

}
