<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Jobs\TestJob;
use App\Mail\EmailForQueuing;
use App\Services\Consumer;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    /**
     * @param Request $request
     * @throws \Exception
     */
    public function send(Request $request, Consumer $consumer)
    {
        try {
            $details = ['email' =>  $request->get('email')];
            $consumer->consumeData($details);
        } catch (\Exception $exception) {
            throw new \Exception("Couldn't send data");
        }

    }
}
