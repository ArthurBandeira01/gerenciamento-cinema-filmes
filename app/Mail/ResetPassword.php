<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    private $token;

    public function __construct($data, $token)
    {
        $this->data  = $data;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('mails.reset-password')->with(['data' => $this->data, 'token' => $this->token]);
    }
}
