<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-authorized', function($user) {
            return $user->role_id === 2;
        });

        Gate::define('user-delete', function($user, $data) {
            return $user->role_id === 2 && $data->role_id != 2;
        });

        Gate::define('user-suspended', function($user) {
            return $user->suspended === 0;
        });

        Gate::define('admin-suspend', function($admin, $user) {
            return $admin->role_id === 2 && $user->role_id != 2;
        });
    }
}
