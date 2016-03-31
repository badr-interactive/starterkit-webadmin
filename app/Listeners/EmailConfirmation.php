<?php

namespace App\Listeners;

use App\Events\UserHasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class EmailConfirmation
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
     * @param  UserHasRegistered  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $user = $event->user;
        $token = bin2hex(random_bytes(16));
        Mail::send('emails.registration', ['user' => $user, 'token' => $token], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Account Activation');
        });
    }
}
