<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $dataObj;

    /**
     * Create a new message instance.
     *
     * @param $dataObj
     * @return void
     */
    public function __construct($dataObj = null)
    {
        $this->dataObj = $dataObj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.admin-notif.mail', ['data' => $this->dataObj]);
    }
}
