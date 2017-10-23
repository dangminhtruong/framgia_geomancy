<?php

namespace App\Listeners;

use App\Events\UnlockAccountEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UnlockAccountMail;

class SendAccountUnlockNoticeMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UnlockAccountEvent  $event
     * @return void
     */
    public function handle(UnlockAccountEvent $event)
    {
        Mail::to($event->email)
        ->queue(new UnlockAccountMail(
            $event->email
        ));
    }
}
