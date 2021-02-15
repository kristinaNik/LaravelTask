<?php

namespace App\Services;

use App\Jobs\SendEmail;

class Consumer
{
    /**
     * @param array $email
     */
    public function consumeData(array $email): void
    {
        SendEmail::dispatch($email);
    }
}
