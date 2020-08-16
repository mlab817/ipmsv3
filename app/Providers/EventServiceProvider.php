<?php

namespace App\Providers;

use App\Events\ProjectProcessed;
use App\Events\ProjectUpdated;
use App\Events\ProjectCreatedEvent;
use App\Listeners\AssignDefaultRole;
use App\Listeners\CreateUserAvatar;
use App\Listeners\RecordProcessingEvent;
use App\Listeners\ProjectUpdated as ProjectUpdatedListener;
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
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogLoginEvent'
        ],
        Registered::class => [
            // CreateUserAvatar::class,
            AssignDefaultRole::class,
            SendCompleteUserProfileNotification::class
        ],
        ProjectCreatedEvent::class => [
          SendProjectCreatedNotification::class
        ],
        'App\Events\RoleChanged' => [
            'App\Listeners\SendRoleChangedNotification'
        ],
        ProjectProcessed::class => [
            RecordProcessingEvent::class
        ],
        ProjectUpdated::class => [
            ProjectUpdatedListener::class
        ]
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
