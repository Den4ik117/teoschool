<?php

namespace App\Providers;

use App\Models\User;
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
         'App\Models\User' => 'App\Policies\UserPolicy',
         'App\Models\Course' => 'App\Policies\CoursePolicy',
         'App\Models\Cheatsheet' => 'App\Policies\CheatsheetPolicy',
         'App\Models\Information' => 'App\Policies\InformationPolicy',
         'App\Models\Module' => 'App\Policies\ModulePolicy',
         'App\Models\Part' => 'App\Policies\PartPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user) {
            if ($user->isDeveloper()) {
                return true;
            }
        });
    }
}
