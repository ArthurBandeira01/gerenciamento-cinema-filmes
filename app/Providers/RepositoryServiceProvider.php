<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    MovieTheaterRepositoryInterface,
    RoomRepositoryInterface,
    UserRepositoryInterface,
    UserTenantRepositoryInterface,
};
use App\Repositories\{
    MovieTheaterRepository,
    RoomRepository,
    UserRepository,
    UserTenantRepository
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            MovieTheaterRepositoryInterface::class,
            MovieTheaterRepository::class,
        );

        $this->app->bind(
            RoomRepositoryInterface::class,
            RoomRepository::class,
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->bind(
            UserTenantRepositoryInterface::class,
            UserTenantRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
