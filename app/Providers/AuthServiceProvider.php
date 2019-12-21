<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // If passed model belongs to user
        Gate::define('update-this', function ($user, Model $model) {
            return $user->id === $model->user_id;
        });

        // If passed model does not belong to user
        Gate::define('add-offer', function ($user, Model $model) {
            return $user->id !== $model->user_id;
        });
    }
}
