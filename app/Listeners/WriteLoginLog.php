<?php

namespace App\Listeners;

use App\Events\UserHasLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SystemLog;
use App\Helpers\MySQLogHelper as Logger;

class WriteLoginLog
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
    public function handle(UserHasLoggedIn $event)
    {
        $user = $event->user;
        $request = $event->request;
        $this->logger->log($user, 'Logged in from '
            . $request->ip() . ' using ' . $request->header('User-Agent'));
    }
}
