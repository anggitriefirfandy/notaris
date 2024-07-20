<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otpCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otpCode)
    {
        $this->otpCode = $otpCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.auth_otp.otp')
            ->subject('Kode OTP untuk Login')
            ->with(['otpCode' => $this->otpCode]);
    }
}
