<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    SessionRoomRepositoryInterface,
    RoomRepositoryInterface,
    UserRepositoryInterface
};
use App\Repositories\{
    SessionRoomRepository,
    RoomRepository,
    UserRepository
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            SessionRoomRepositoryInterface::class,
            SessionRoomRepository::class,
        );

        $this->app->bind(
            RoomRepositoryInterface::class,
            RoomRepository::class,
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
    }

    public function boot(): void
    {

    }
}
