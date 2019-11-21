<?php

namespace App\Jobs;

use App\Mail\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var array
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @param array $data
     */
    public function __construct($data)
    {

        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param Request $request
     * @return void
     */
    public function handle()
    {
        Mail::send(new Contact($this->data));
    }
}
