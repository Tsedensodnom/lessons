<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('admin-access', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->code == 'admin') {
                    return true;
                }
            }
            return false;
        });
        
        $gate->define('author-access', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->code == 'author') {
                    return true;
                }
            }
            return false;
        });
    }
}
