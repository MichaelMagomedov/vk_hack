<?php

namespace App\Clients\Repositories;

use App\Clients\Mappers\VkClientMapper;
use App\Clients\Models\Client;
use VK\Client\VKApiClient;

final class ClientRepository
{
    private $vkClient;

    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        $this->vkClient = new VKApiClient();
    }


    public function create(Client $client): void
    {
        Client::query()->updateOrCreate([
            'external_id' => $client->external_id
        ], $client->getAttributes());
    }

    public function getByToken(string $token): Client
    {
        $response = $this->vkClient->users()->get($token, array(
            'fields' => [
                'photo_100',
                'education',
                'contacts',
                'relation',
                'relatives',
                'connections',
            ],
        ))[0];
        return VkClientMapper::create($response);
    }

    public function getByExternalId(string $externalId): Client
    {
        return CLient::whereExternalId($externalId)->first();
    }

}
