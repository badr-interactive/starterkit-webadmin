<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Helpers\MySQLogHelper as Logger;
use App\SystemLog;

class WriteLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle the event.
     *
     * @param  UserHasLoggedIn  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        $action = 'undefined';

        if ($event instanceof \App\Events\UserPasswordHasChanged) {
            $action = 'Change password';
        } elseif ($event instanceof \App\Events\UserHasLoggedIn) {
            $action = 'Logged in';
        }

        $this->logger->log($user, $action);
    }
}
