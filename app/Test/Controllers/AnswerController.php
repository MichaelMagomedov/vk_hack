<?php

namespace App\Test\Controllers;

use App\Root\Http\Controllers\Controller;
use App\Test\Services\AnswerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

final class AnswerController extends Controller
{

    /** @var AnswerService */
    private $answerService;
    /** @var Request */
    private $request;

    /**
     * AnswerController constructor.
     * @param AnswerService $answerService
     * @param Request $request
     */
    public function __construct(AnswerService $answerService, Request $request)
    {
        $this->answerService = $answerService;
        $this->request = $request;
    }


    public function save()
    {
        $validator = Validator::make($this->request->all(), [
            'external_id' => 'required',
            'answers' => 'required|array',
            'answers.*' => 'integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $externalId = $this->request->get('external_id');
        $answers = $this->request->get('answers');
        $result = $this->answerService->saveAnswers($externalId, $answers);

        return response()->json([
            'message' => $result
        ]);
    }

}
