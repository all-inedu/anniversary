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

    public function sendReminderH7($detail)
    {
        Mail::send('mail-reminder-h7', $detail, function ($message) use ($detail) {
            $message->to($detail['recipient']['email'], $detail['recipient']['name'])
                ->subject($detail['subject']);
        });
    }

    public function sendReminderH1($detail)
    {
        Mail::send('mail-reminder-h1', $detail, function ($message) use ($detail) {
            $message->to($detail['recipient']['email'], $detail['recipient']['name'])
                ->subject($detail['subject']);
        });
    }

    public function sendReminderUniPrepH1($detail)
    {
        Mail::send('mail-reminder-prep', $detail, function ($message) use ($detail) {
            $message->to($detail['recipient']['email'], $detail['recipient']['name'])
                ->subject($detail['subject']);
        });
    }
}