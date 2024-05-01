<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // This first use Gate
        Gate::define('isAdmin', function ($user) {
            if ($user->position == 'customer') {

                return $user->roles;
            }
        });
        Gate::define('cars', function ($user) {
            if ($user->position == 'userAdmin') {
                foreach ($user->roles as $role) {
                    if ($role->role_name == "cars") {
                        return $role->role_name == "cars";
                    }
                }
            } else {
                if ($user->position == 'customer') {
                    return $user->position == 'customer';
                }
            }
        });
        Gate::define('nawlon', function ($user) {
            if ($user->position == 'userAdmin') {
                foreach ($user->roles as $role) {
                    if ($role->role_name == "nawlon") {
                        return $role->role_name == "nawlon";
                    }
                }
            } else {
                if ($user->position == 'customer') {
                    return $user->position == 'customer';
                }
            }
        });
        Gate::define('employee', function ($user) {
            if ($user->position == 'userAdmin') {
                foreach ($user->roles as $role) {
                    if ($role->role_name == "employee") {
                        return $role->role_name == "employee";
                    }
                }
            } else {
                if ($user->position == 'customer') {
                    return $user->position == 'customer';
                }
            }
        });
    }
}
