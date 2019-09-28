<?php

namespace App\Clients\Repositories;

use App\Clients\Models\Client;

class CLientRepository
{
    public function create(Client $client)
    {
        Client::query()->updateOrCreate([
            'external_id' => $client->external_id
        ], $client->getAttributes());
    }
}
