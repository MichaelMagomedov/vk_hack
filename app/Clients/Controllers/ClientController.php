<?php

namespace App\Clients\Controllers;

use App\Clients\Models\Client;
use App\Clients\Repositories\ClientRepository;
use App\Root\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ClientController extends Controller
{

    /** @var Request */
    private $request;
    /** @var ClientRepository */
    private $clientRepository;

    /**
     * ClientController constructor.
     * @param Request $request
     * @param ClientRepository $clientRepository
     */
    public function __construct(Request $request, ClientRepository $clientRepository)
    {
        $this->request = $request;
        $this->clientRepository = $clientRepository;
    }

    public function create(): JsonResponse
    {
        $client = (new Client($this->request->all()));
        $this->clientRepository->insertOnDuplicate($client);
        return response()->json([
            'message' => 'success'
        ]);
    }
}

