<?php

namespace App\Listeners;

use App\Events\UserHasLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateUserLastLogin
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
     * @param  UserHasLoggedIn  $event
     * @return void
     */
    public function handle(UserHasLoggedIn $event)
    {
        $timestamp = date('Y-m-d H:i:s');
        $user = $event->user;
        $user->last_login = $timestamp;
        $user->save();
    }
}
