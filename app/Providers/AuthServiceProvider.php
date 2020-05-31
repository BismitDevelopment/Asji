<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Profile;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('is_admin', function($user){
            return $user->is_admin;
        });

        Gate::define('is_member', function($user){
            return $user->is_member;
        });

        Gate::define('access_journal', function($user){
            return $user->is_member | $user->is_admin;
        });

        Gate::define('update_profile', function($user, Profile $profile){
            return $user->id === $profile->user_id;
        });

    }
}
