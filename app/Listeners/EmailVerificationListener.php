<?php

namespace App\Listeners;

use App\Events\EmailVerificationEvent;
use App\Jobs\EmailVerificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class EmailVerificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmailVerificationEvent $event): void
    {
        EmailVerificationJob::dispatch($event->data);
    }
}
