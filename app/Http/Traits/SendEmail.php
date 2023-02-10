<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

trait SendEmail {

    public function sendWelcomingMessage($detail)
    {
        Mail::send('mail-welcome', $detail, function ($message) use ($detail) {
            $message->to($detail['recipient']['email'], $detail['recipient']['name'])
                ->subject($detail['subject']);
        });
    }

    public function sendReminder($detail)
    {
        Mail::send('mail-reminder', $detail, function ($message) use ($detail) {
            $message->to($detail['recipient']['email'], $detail['recipient']['name'])
                ->subject($detail['subject']);
        });
    }
}