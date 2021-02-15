<?php


namespace App\Services;


use App\Jobs\SendEmail;
use Carbon\Carbon;



class Consumer
{
    /**
     * @param array $email
     */
    public function consumeData(array $email): void
    {

       // dd(utf8_encode($delay);

        SendEmail::dispatch($email);

    }
}
