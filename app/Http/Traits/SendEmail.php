<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

trait SendEmail {

    public function send($detail)
    {
        Mail::send('mail', $detail, function ($message) use ($detail) {
            $message->to($detail['recipient']['email'], $detail['recipient']['name'])
                ->subject($detail['subject']);
        });
    }
}