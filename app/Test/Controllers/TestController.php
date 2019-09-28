<?php

namespace App\Test\Controllers;

use App\Root\Http\Controllers\Controller;
use App\Test\Repositories\TestRepository;
use Illuminate\Http\JsonResponse;

final class TestController extends Controller
{
    /** @var TestRepository */
    private $testRepository;

    /**
     * TestController constructor.
     * @param TestRepository $testRepository
     */
    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }


    public function getById(int $id): JsonResponse
    {
        $test = $this->testRepository->findById($id);
        return response()->json($test);
    }
}
