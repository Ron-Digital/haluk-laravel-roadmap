<?php

namespace App\Listeners;

use App\Events\UserRegistered as EventsUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventsUserRegistered $event)
    {
        $user = $event->user;

        $data = [
            'bir' => 'Hoşgeldiniz',
            'iki' => 'Başarıyla kayıt oldunuz.'
        ];

        $mail = new \App\Mail\MailEvent($data);

        Mail::to($user->email)->send($mail);
    }
}
