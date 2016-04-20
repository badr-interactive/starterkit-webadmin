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
            'App\Listeners\WriteLoginLog',
            'App\Listeners\UpdateUserLastLogin'
        ],
        'App\Events\UserHasRegistered' => [
            'App\Listeners\EmailConfirmation'
        ],
        'App\Events\UserPasswordHasChanged' => [
            'App\Listeners\WriteLoginLog'
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
