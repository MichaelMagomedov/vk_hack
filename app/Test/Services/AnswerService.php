<?php

namespace App\Test\Services;

use App\Clients\Repositories\ClientRepository;

final class AnswerService
{
    /** @var ClientRepository */
    private $clientRepository;

    /**
     * AnswerService constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function saveAnswers(string $accessToken, array $answers): void
    {
        $client = $this->clientRepository->getByToken($accessToken);

    }
}
