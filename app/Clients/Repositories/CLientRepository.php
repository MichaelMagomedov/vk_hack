<?php

namespace App\Clients\Repositories;

use App\Clients\Models\Client;

class CLientRepository
{
    public function create(Client $client)
    {
        Client::insertOnDuplicateKey($client->getAttributes());
    }
}
