<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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
 
        Gate::define('is_Secretaria', function ($user) {
            return $user->acesso == 'secretaria'
                            ? true
                            : false;
    });

        Gate::define('is_Aluno', function ($user) {
        return $user->acesso == 'aluno'
                        ? true
                        : false;
    });

        Gate::define('is_Prof', function ($user) {
        return $user->acesso == 'professor'
                        ? true
                        : false;
    });

    }
}
