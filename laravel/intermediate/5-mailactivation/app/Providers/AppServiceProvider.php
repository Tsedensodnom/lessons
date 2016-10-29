<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications\ActivationCodeRequested;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\User::creating(function ($user) {
            $user->is_activated = 0;
            $user->activation_code = \Hash::make(str_random(40));
            
            \Notification::send($user, new ActivationCodeRequested);
            
            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
