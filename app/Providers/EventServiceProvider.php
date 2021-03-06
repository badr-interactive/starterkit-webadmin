<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserHasLoggedIn' => [
            'App\Listeners\WriteLog',
            'App\Listeners\UpdateUserLastLogin'
        ],
        'App\Events\UserHasRegistered' => [
            'App\Listeners\EmailConfirmation'
        ],
        'App\Events\UserPasswordHasChanged' => [
            'App\Listeners\WriteLog'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }
}
