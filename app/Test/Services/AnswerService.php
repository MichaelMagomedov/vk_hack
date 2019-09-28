<?php

namespace App\Test\Services;

use App\Clients\Repositories\ClientRepository;
use App\Test\Models\Answer;
use App\Test\Models\TestResult;
use App\Test\Repositories\AnswerRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Collection;

final class AnswerService
{
    /** @var ClientRepository */
    private $clientRepository;
    /** @var AnswerRepository */
    private $answerRepository;

    /**
     * AnswerService constructor.
     * @param ClientRepository $clientRepository
     * @param AnswerRepository $answerRepository
     */
    public function __construct(ClientRepository $clientRepository, AnswerRepository $answerRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->answerRepository = $answerRepository;
    }

    private function generateRandomResultByAnswers(Collection $answers): TestResult
    {
        /** @var Answer $answer */
        $answer = $answers->get(0);
        /** @var Collection $existResults */
        $existResults = $answer->question->test->results;
        if ($existResults->isEmpty()) {
            throw new \InvalidArgumentException('this test does not have any results');
        }

        return $answer->question->test->results->random(1)->first();
    }

    public function saveAnswers(string $externalId, array $answerIds): array
    {
        $existClient = $this->clientRepository->getByExternalId($externalId);
        $answers = $this->answerRepository->findByIds($answerIds);
        $randomResult = $this->generateRandomResultByAnswers($answers);
        foreach ($answerIds as $answerId) {
            $existClient->answers()->attach($answerId);
        }
        $answerProducts = $answers->pluck('products');
        $resultProducts = collect([]);
        /** @var Collection $products */
        foreach ($answerProducts as $products) {
            $resultProducts = $resultProducts->merge($products);
        }
        $randomProduct = $resultProducts->random(1)->first();
        return [
            'products' => $randomProduct,
            'result' => $randomResult,
        ];
    }
}
