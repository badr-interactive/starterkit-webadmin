<?php

namespace App\Helpers;

use App\SystemLog;
use Request;

class MySQLogHelper
{
    function __construct(SystemLog $log)
    {
        $this->log = $log;
    }

    public function log($user, $action)
    {
        $timestamp = date('Y-m-d H:i:s');

        $this->log->timestamp = $timestamp;
        $this->log->user = $user->email;
        $this->log->action = $action;
        $this->log->ip_address = Request::ip();
        $this->log->user_agent = Request::header('User-Agent');
        $this->log->save();
    }
}
