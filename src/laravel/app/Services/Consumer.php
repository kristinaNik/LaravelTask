<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\Jobs\SendSMS;

class Consumer
{
    /**
     * @param array $details
     */
    public function consumeData(array $details): void
    {
        SendEmail::dispatch($details);
        SendSMS::dispatch($details);
    }
}
