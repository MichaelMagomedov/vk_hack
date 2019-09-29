<?php

namespace App\Test\Repositories;

use App\Test\Models\Answer;
use Illuminate\Database\Eloquent\Collection;

final class AnswerRepository
{

    public final function findByIds(array $ids): Collection
    {
        return Answer::with([
            'question.test'
        ])->whereIn('id', $ids)->get();
    }

}
