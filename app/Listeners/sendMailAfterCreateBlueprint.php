<?php

namespace App\Listeners;

use App\Events\CreateBluePrintDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\reportCantSendEmail;
use App\Mail\thanksForCreate;

class sendMailAfterCreateBlueprint implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateBluePrintDone $event
     * @return void
     */
    public function handle(CreateBluePrintDone $event)
    {
        Mail::to($event->blueprintInfo->user->email)->send(new thanksForCreate($event->blueprintInfo));
    }

    public function failed(CreateBluePrintDone $event, $exception)
    {
        Mail::to(env('MAIL_USERNAME'))->send(new reportCantSendEmail($event->blueprintInfo, $exception->getMessage()));
    }
}
