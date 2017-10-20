<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LockAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $reason;
    public $siteUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $reason)
    {
        $this->email = $email;
        $this->reason = $reason;
        $this->siteUrl = env('APP_URL');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_NAME'))
            ->view('emails.lock_account');
    }
}
