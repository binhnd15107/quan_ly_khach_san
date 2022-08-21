<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class bill_final extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mailData;


    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Khách sạn Fpoly")
            ->markdown('email.billFinal');
    }
}
