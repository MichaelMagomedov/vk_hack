<?php

namespace App\Clients\Services;

use App\Clients\Mappers\VkClientMapper;
use App\Clients\Models\Client;
use App\Clients\Repositories\ClientRepository;
use VK\Client\VKApiClient;

final class ClientService
{
    private $vkClient;
    /** @var ClientRepository */
    private $clientRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->vkClient = new VKApiClient();
        $this->clientRepository = $clientRepository;
    }


    public function create(string $token): void
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
        $client = VkClientMapper::create($response);
        $this->clientRepository->create($client);
    }
}
