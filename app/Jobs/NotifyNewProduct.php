<?php

namespace App\Jobs;

use App\Mail\MailTesting;
use App\Notifications\NewProductNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotifyNewProduct implements ShouldQueue
{
use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @param $product
     */
    public function __construct($product)
    {
//        dd($details);
        $this->details = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new MailTesting();
//        Mail::to('alisson@email.com')->send($email);
        Notification::send(Auth::user(), new NewProductNotification($this->details));
    }
}
