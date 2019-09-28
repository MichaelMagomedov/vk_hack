<?php

namespace App\Clients\Controllers;

use App\Clients\Services\ClientService;
use App\Root\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;

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


    public function create()
    {
        try{
        $this->validate($this->request, ['access_token' => 'required']);
        }catch (\Exception $exception){
            return var_dump($exception->getMessage());
        }


        $accessToken = $this->request->get('access_token');
        $this->clientService->create($accessToken);

        return view('welcome');
    }
}

