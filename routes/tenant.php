<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\MovieTheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserTenantController;

Route::middleware(['web', 'global.variables', InitializeTenancyByDomain::class, PreventAccessFromCentralDomains::class])->group(function () {
    Route::get('/', [SiteController::class, "index"])->name('index');

    //Usuarios tenant:
    Route::get('usuarios/index', [UserTenantController::class, "index"])->name('usersTenant');
    Route::get('usuario/create', [UserTenantController::class, "create"])->name('usersTenantCreate');
    Route::post('usuario/store', [UserTenantController::class, "store"])->name('usersTenantStore');
    Route::post('usuario/{user}/show', [UserTenantController::class, "show"])->name('usersTenantShow');
    Route::get('usuario/{user}/edit', [UserTenantController::class, "edit"])->name('usersTenantEdit');
    Route::put('usuario/{user}', [UserTenantController::class, "update"])->name('usersTenantUpdate');
    Route::delete('usuario/{user}', [UserTenantController::class, "destroy"])->name('usersTenantDestroy');

    //Cinemas:
    Route::get('movie-theaters/index', [MovieTheaterController::class, "index"])->name('movieTheater');
    Route::get('movie-theater/create', [MovieTheaterController::class, "create"])->name('movieTheaterCreate');
    Route::post('movie-theater/store', [MovieTheaterController::class, "store"])->name('movieTheaterStore');
    Route::post('movie-theater/{movieTheater}/show', [MovieTheaterController::class, "show"])->name('movieTheaterShow');
    Route::get('movie-theater/{movieTheater}/edit', [MovieTheaterController::class, "edit"])->name('movieTheaterEdit');
    Route::put('movie-theater/{movieTheater}', [MovieTheaterController::class, "update"])->name('movieTheaterUpdate');
    Route::delete('movie-theater/{movieTheater}', [MovieTheaterController::class, "destroy"])->name('movieTheaterDestroy');

    //Salas:
    Route::get('rooms/index', [RoomController::class, "index"])->name('rooms');
    Route::get('room/create', [RoomController::class, "create"])->name('roomCreate');
    Route::post('room/store', [RoomController::class, "store"])->name('roomStore');
    Route::post('room/{room}/show', [RoomController::class, "show"])->name('roomShow');
    Route::get('room/{room}/edit', [RoomController::class, "edit"])->name('roomEdit');
    Route::put('room/{room}', [RoomController::class, "update"])->name('roomUpdate');
    Route::delete('room/{room}', [RoomController::class, "destroy"])->name('roomDestroy');
});

// Route::middleware(['web', InitializeTenancyByDomain::class, PreventAccessFromCentralDomains::class,])->group(function () {

// });
