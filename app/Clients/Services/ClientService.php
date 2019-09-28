<?php

namespace App\Clients\Services;

use App\Clients\Repositories\ClientRepository;

final class ClientService
{
    private $clientRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }


    public function create(string $token): void
    {
    }
}
