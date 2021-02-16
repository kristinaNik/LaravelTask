<?php

namespace App\Http\Controllers;


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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function send(Request $request)
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
