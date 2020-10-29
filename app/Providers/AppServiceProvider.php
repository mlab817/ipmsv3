<?php

namespace App\Providers;

use App\Models\PrexcActivity;
use App\Models\Project;
use App\Observers\PrexcActivityObserver;
use App\Observers\ProjectObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Project::observe(ProjectObserver::class);
        PrexcActivity::observe(PrexcActivityObserver::class);
        User::observer(UserObserver::class);
    }
}
