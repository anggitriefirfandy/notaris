<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;
    public $otpCode; // Definisikan properti $otpCode

    /**
     * Create a new message instance.
     */
    public function __construct($otpCode)
    {
        $this->otpCode = $otpCode;
    }
    public function build()
    {
        \Log::info('Attempting to send OTP email to: ' . $this->to[0]['address']);
        return $this->view('pages.auth_otp.otp')
            ->subject('Kode OTP untuk Login')
            ->with([
                'otpCode' => $this->otpCode, // Kirim data ke view
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Otp Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
