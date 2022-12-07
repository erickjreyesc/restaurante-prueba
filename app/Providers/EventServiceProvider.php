<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        /*
        'App\Events\Notifications\EmailRequesterEvent' => [
            'App\Listeners\Notifications\EmailRequesterListener'
        ],
        'App\Events\Notifications\RadicadorClosesNotifyEvent' => [
            'App\Listeners\Notifications\RadicadorClosesNotifyListener'
        ],
        'App\Events\Notifications\RadicadorNewsNotifyEvent' => [
            'App\Listeners\Notifications\RadicadorNewsNotifyListener'
        ],
        'App\Events\Notifications\RadicadorFinishNotifyEvent' => [
            'App\Listeners\Notifications\RadicadorFinishNotifyListener'
        ],
        'App\Events\Notifications\RadicadorAssignNotifyEvent' => [
            'App\Listeners\Notifications\RadicadorAssignNotifyListener'
        ],
        'App\Events\Notifications\RadicadorNewRequestEvent' => [
            'App\Listeners\Notifications\RadicadorNewRequestListener'
        ],
        'App\Events\Notifications\RadicadorInvalidTimeEvent' => [
            'App\Listeners\Notifications\RadicadorInvalidTimeListener'
        ],
        */
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
