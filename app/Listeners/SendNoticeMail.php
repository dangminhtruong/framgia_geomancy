<?php

namespace App\Listeners;

use App\Events\LockAccountEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LockAccountMail;

class SendNoticeMail
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
     * @param  LockAccountEvent  $event
     * @return void
     */
    public function handle(LockAccountEvent $event)
    {
        Mail::to($event->email)
            ->queue(new LockAccountMail(
                $event->email,
                $event->reason
            ));
    }
}
