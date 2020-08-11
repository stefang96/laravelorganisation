<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mes;
    public $sub;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$subject)
    {
        $this->sub=$subject;
        $this->mes=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_sub=$this->sub;
        $e_mes=$this->mes;

        return $this->view('mail.sendemail',compact('e_mes'))->subject($e_sub);
    }
}
