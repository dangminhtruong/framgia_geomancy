<?php

namespace App\Listeners;

use App\Events\ResetPasswordEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class SendResetMail implements ShouldQueue
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
     * @param  ResetPassword  $event
     * @return void
     */
    public function handle(ResetPasswordEvent $event)
    {
        Mail::to($event->resetPassword->email)
            ->queue(new ResetPasswordMail(
                $event->resetPassword->token,
                $event->resetPassword->email
            ));
    }

    public function failed(ResetPasswordEvent $event)
    {
        die('ERROR');
    }
}
