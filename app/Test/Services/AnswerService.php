<?php

namespace App\Test\Services;

use App\Clients\Repositories\ClientRepository;
use App\Test\Models\Answer;
use App\Test\Models\TestResult;
use App\Test\Repositories\AnswerRepository;
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
        return $answer->question()->test()->results()->random(1)->first();
    }

    public function saveAnswers(string $externalId, array $answerIds): array
    {
        $existClient = $this->clientRepository->getByExternalId($externalId);
        foreach ($answerIds as $answerId) {
            $existClient->answers()->attach($answerId);
        }
        $answers = $this->answerRepository->findByIds($answerIds);
        $answerProducts = $answers->pluck('products');
        $resultProducts = collect([]);
        /** @var Collection $products */
        foreach ($answerProducts as $products) {
            $resultProducts = $resultProducts->merge($products);
        }

        return [
            'products' => $resultProducts,
            'result' => $this->generateRandomResultByAnswers($answers),
        ];
    }
}
