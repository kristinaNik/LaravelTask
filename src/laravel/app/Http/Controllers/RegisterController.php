<?php

namespace App\Http\Controllers;


use App\Http\Requests\SendFormParamsValidation;
use App\Services\DispatchService;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    private $dispatchService;

    /**
     * RegisterController constructor.
     * @param DispatchService $dispatchService
     */
    public function __construct(DispatchService $dispatchService)
    {
        $this->dispatchService = $dispatchService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('form');
    }

    /**
     * @param SendFormParamsValidation $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(SendFormParamsValidation $request)
    {
        try {
            $details = ['email' =>  $request->get('email'), 'phone' => $request->get('phone')];
            $this->dispatchService->dispatchData($details);
            return response()->json(['message' => 'Successfully send email'], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Failed to send email'], 500);
        }

    }
}
