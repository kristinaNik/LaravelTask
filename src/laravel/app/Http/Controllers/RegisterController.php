<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('form');
     //   TestJob::dispatch($users);
    }


    public function send(Request $request)
    {
       dd($request);
    }
}
