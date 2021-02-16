<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\Jobs\SendSMS;

class DispatchService
{
    /**
     * @param array $details
     */
    public function dispatchData(array $details): void
    {
        SendEmail::dispatch($details);
        SendSMS::dispatch($details);
    }
}
