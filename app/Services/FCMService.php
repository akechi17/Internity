<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\Http;

class FCMService
{
    public static function send($token, $notification)
    {
        Http::acceptJson()->withToken(config('app.fcm_key'))->post('https://fcm.googleapis.com/fcm/send', [
            'to' => $token,
            'notification' => $notification,
        ]);
    }
}
