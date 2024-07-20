<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class TestEmailController extends Controller
{
    public function sendTestEmail()
    {
        $toEmail = 'irfandyanggit@gmail.com';
        $subject = 'Test Email';
        $body = 'This is a test email.';

        try {
            Mail::raw($body, function ($message) use ($toEmail, $subject) {
                $message->to($toEmail)
                    ->subject($subject);
            });

            return 'Email sent successfully!';
        } catch (\Exception $e) {
            return 'Failed to send email: ' . $e->getMessage();
        }
    }
}
