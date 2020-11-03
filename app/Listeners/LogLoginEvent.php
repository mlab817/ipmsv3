<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLoginEvent
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // $event->user->setLoginLog();
        $user = $event->user;

        Log::info($user->name . ' logged in just now');

        $user->logins()->insert([
          'user_id' => $this->id,
          'login_at' => Carbon::now()
        ]);
    }
}
