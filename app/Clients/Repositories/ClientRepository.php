<?php

namespace App\Clients\Repositories;

use App\Clients\Mappers\VkClientMapper;
use App\Clients\Models\Client;
use VK\Client\VKApiClient;

final class ClientRepository
{
    public function __construct()
    {
    }

    public function getByExternalId(string $externalId): Client
    {
        return CLient::whereExternalId($externalId)->first();
    }

}
