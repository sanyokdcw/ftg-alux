<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallData extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    protected const MAIL_SUBJECT = 'Заявка на "ОБРАТНЫЙ ЗВОНОК"'; 

    /**
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->subject(self::MAIL_SUBJECT)
            ->view('call-mail');
    }
}
