<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserTenant;
use App\Policies\UserPolicy;
use App\Policies\UserTenantPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        User::class => UserPolicy::class,
        UserTenant::class => UserTenantPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
