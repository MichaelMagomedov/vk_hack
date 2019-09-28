<?php

namespace App\Clients\Controllers;

use App\Clients\Services\ClientService;
use App\Root\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use VK\Exceptions\VKApiException;

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


    public function create(): JsonResponse
    {
        $this->validate($this->request, ['access_token' => 'required']);
        if (!empty($errors)) {
            return response()->json(['message' => 'fail validation'], 400);
        }

        try {
            $accessToken = $this->request->get('access_token');
            $this->clientService->create($accessToken);
        } catch (VKApiException $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}

https://app.bookinator.ru/booking?providerId=1&api_url=https://api.vk.com/api.php&api_id=6622979&api_settings=0&viewer_id=43782292&viewer_type=4&sid=7e7678e05c6f01048a2c938fbc76233bc54602bf4db11aacf97f18cca15d063a602d2685511a0dc23ace3&secret=1d894101a1&access_token=6a8cb365b5cee248a29486399ce97eef3c7b3936da5c01f81718546ca83913b77bd73ad0a71a05c999ebb&user_id=0&group_id=170640538&is_app_user=0&auth_key=866548e280dc470ad5e6e0b1b928de4e&language=0&parent_language=0&is_secure=1&stats_hash=0e31f9342d72258128&ads_app_id=6622979_89439c1847c63a3d9a&referrer=group&lc_name=73807aa5&sign=f5ea11c17840fc09cb4d8616ddf88a7df119ae491d6fd945f92905a39cc75850&hash=
