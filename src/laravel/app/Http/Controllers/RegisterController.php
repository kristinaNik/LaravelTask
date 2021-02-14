<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $users = ['user1' => 'user1@email.com', 'user2' => 'user2@email.com'];

        TestJob::dispatch($users);
    }
}
