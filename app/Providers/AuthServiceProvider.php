<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Role;
use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        $roles = Role::all();

        foreach ($roles as $role) {
            Gate::define($role->name, function (User $user) use ($role) {
                return $user->role_id === $role->id;
            });
        }
    }
}

