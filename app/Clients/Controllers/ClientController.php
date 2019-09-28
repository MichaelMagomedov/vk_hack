<?php

namespace App\Clients\Controllers;

use App\Clients\Services\ClientService;
use App\Root\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ClientController extends Controller
{
    /** @var ClientService */
    private $clientService;

    /** @var Request */
    private $request;

    /**
     * ClientController constructor.
     * @param ClientService $clientService
     * @param Request $request
     */
    public function __construct(ClientService $clientService, Request $request)
    {
        $this->clientService = $clientService;
        $this->request = $request;
    }


    public function createNew(): JsonResponse
    {
//        $accessToken = $this->request->get('access_token');
        $this->clientService->createNew('7a0423c6eddc11c8286f9ab6bf74324c80c14eccc815ce5909e554b052451736f135f971b334f8d24d0b6');

        return response()->json([
            'message' => 'success'
        ]);
    }
}
