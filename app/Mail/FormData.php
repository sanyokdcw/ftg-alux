<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormData extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    protected const MAIL_SUBJECT = 'Заявка на "ПОДОБРАТЬ СИСТЕМУ"'; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(self::MAIL_SUBJECT)
            ->view('email');
    }
}
