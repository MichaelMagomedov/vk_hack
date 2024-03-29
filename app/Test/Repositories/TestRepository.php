<?php

namespace App\Test\Repositories;

use App\Test\Models\Test;

final class TestRepository
{

    public final function findById(int $id): Test
    {
        return Test::with([
            'questions',
            'questions.answers',
        ])->whereId($id)->first();
    }

}
