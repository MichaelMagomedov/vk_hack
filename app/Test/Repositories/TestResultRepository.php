<?php

namespace App\Test\Repositories;


use App\Test\Models\TestResult;

final class TestResultRepository
{
    public final function findByTestAndRate(int $testId, int $rate): ?TestResult
    {
        return TestResult::where([
            ['test_id', '=', $testId],
            ['from', '<=', $rate],
            ['to', '>=', $rate],
        ])->first();
    }

}
