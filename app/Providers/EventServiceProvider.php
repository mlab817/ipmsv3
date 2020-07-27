<?php

namespace App\Providers;

use App\Events\ProjectUpdatedEvent;
use App\Events\ProjectCreatedEvent;
use App\Listeners\AssignDefaultRole;
use App\Listeners\CreateUserAvatar;
use App\Listeners\RecordUpdatedEvent;
use App\Listeners\SendCompleteUserProfileNotification;
use App\Listeners\SendProjectCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            // CreateUserAvatar::class,
            AssignDefaultRole::class,
            SendCompleteUserProfileNotification::class
        ],
        ProjectCreatedEvent::class => [
          SendProjectCreatedNotification::class
        ],
        ProjectUpdatedEvent::class => [
            RecordUpdatedEvent::class
        ],
        'App\Events\RoleChanged' => [
            'App\Listeners\SendRoleChangedNotification'
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
