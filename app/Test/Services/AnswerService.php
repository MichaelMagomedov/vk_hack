<?php

namespace App\Test\Services;

use App\Clients\Repositories\ClientRepository;
use App\Test\Models\Product;
use App\Test\Repositories\AnswerRepository;
use App\Test\Repositories\TestResultRepository;
use Illuminate\Database\Eloquent\Collection;

final class AnswerService
{
    /** @var ClientRepository */
    private $clientRepository;
    /** @var AnswerRepository */
    private $answerRepository;
    /** @var TestResultRepository */
    private $testResultRepository;

    /**
     * AnswerService constructor.
     * @param ClientRepository $clientRepository
     * @param AnswerRepository $answerRepository
     * @param TestResultRepository $testResultRepository
     */
    public function __construct(ClientRepository $clientRepository, AnswerRepository $answerRepository, TestResultRepository $testResultRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->answerRepository = $answerRepository;
        $this->testResultRepository = $testResultRepository;
    }

    public function saveAnswers(string $externalId, array $answerIds): array
    {
        $existClient = $this->clientRepository->getByExternalId($externalId);
        foreach ($answerIds as $answerId) {
            $existClient->answers()->attach($answerId);
        }

        $answers = $this->answerRepository->findByIds($answerIds);
        $rate = $answers->sum('rate');
        $testId = $answers->get(0)->question->test->id;
        $testResult = $this->testResultRepository->findByTestAndRate($testId, $rate);
        if (!isset($testResult)) {
            $testResult = $this->testResultRepository->findByTest($testId);
        }
        $answerProducts = $answers->pluck('products');
        $resultProducts = collect([]);
        /** @var Collection $products */
        foreach ($answerProducts as $products) {
            $resultProducts = $resultProducts->merge($products);
        }
        $productResult = Product::all()->random(1)->first();
        if ($resultProducts->count() !== 0) {
            $productResult = $resultProducts->random(1)->first();
            $existClient->products()->attach($productResult);
        }

        return [
            'products' => $productResult,
            'result' => $testResult,
        ];
    }
}
