<?php

namespace App\Clients\Services;

use App\Clients\Mappers\VkClientMapper;
use App\Clients\Models\Client;
use App\Clients\Repositories\CLientRepository;
use VK\Client\VKApiClient;

final class ClientService
{
    private $vkClient;
    /** @var CLientRepository */
    private $clientRepository;

    /**
     * ClientService constructor.
     * @param CLientRepository $clientRepository
     */
    public function __construct(CLientRepository $clientRepository)
    {
        $this->vkClient = new VKApiClient();
        $this->clientRepository = $clientRepository;
    }


    public function createNew(string $token): void
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
