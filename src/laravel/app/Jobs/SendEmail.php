<?php

namespace App\Jobs;

use App\Mail\EmailForQueuing;
use App\Mail\EmailWithAttachment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Vonage\Message\Message;
use Vonage\SMS\Message\SMS;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailForQueuing();
        echo sprintf("Sending message to %s", $this->data['email']);

        Mail::to($this->data['email'])->send($email);
        $this->sendEmailLater();
    }


    private function sendEmailLater()
    {
        $emailWithAttachment = new EmailWithAttachment();
        $delay = Carbon::now()->addMinutes(15)->toString();

        Mail::to($this->data['email'])->later($delay, $emailWithAttachment);
    }

}
