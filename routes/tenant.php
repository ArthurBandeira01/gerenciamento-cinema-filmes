<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SessionsRoomController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Session\Middleware\StartSession;


Route::middleware(['web', 'global.variables', InitializeTenancyByDomain::class,
PreventAccessFromCentralDomains::class])->group(function () {
    Route::get('/inicio', [SiteController::class, "index"])->name('index');
    Route::get('/admin', [LoginController::class, 'index'])->name('homeTenant');
    Route::post('/admin', [LoginController::class, 'login'])->name('loginTenant');
    Route::get('/esqueceu-senha', [LoginController::class, "rememberPassword"])->name('rememberPasswordTenant');
    Route::post('/esqueceu-senha', [LoginController::class, "tokenRememberPassword"])
    ->name('tokenRememberPasswordTenant');
    Route::get('/redefinir-senha/{token?}', [LoginController::class, "resetPassword"])->name('resetPasswordTenant');
    Route::post('/redefinir-senha', [LoginController::class, "changePassword"])->name('changePasswordTenant');
});

Route::middleware(['web', 'userAccessTenant', 'global.variables',
 InitializeTenancyByDomain::class, PreventAccessFromCentralDomains::class])->group(function(){
    Route::prefix('/admin/')->group(function () {
        Route::get('index', [AdminController::class, "index"])->name('adminTenant');
        Route::post('/admin/logout', [LoginController::class, "logout"])->name('logoutTenant');

        //Usuarios tenant:
        Route::get('usuarios/index', [UserController::class, "index"])->name('usersTenant');
        Route::get('usuario/create', [UserController::class, "create"])->name('usersTenantCreate');
        Route::post('usuario/store', [UserController::class, "store"])->name('usersTenantStore');
        Route::post('usuario/{user}/show', [UserController::class, "show"])->name('usersTenantShow');
        Route::get('usuario/{user}/edit', [UserController::class, "edit"])->name('usersTenantEdit');
        Route::put('usuario/{user}', [UserController::class, "update"])->name('usersTenantUpdate');
        Route::delete('usuario/{user}', [UserController::class, "destroy"])->name('usersTenantDestroy');

        //Cinemas:
        Route::get('sessoes-de-filmes/index', [SessionsRoomController::class, "index"])->name('sessionRoom');
        Route::get('sessoes-de-filmes/create', [SessionsRoomController::class, "create"])->name('sessionRoomCreate');
        Route::post('sessoes-de-filmes/store', [SessionsRoomController::class, "store"])->name('sessionRoomStore');
        Route::post('sessoes-de-filmes/{sessionRoom}/show', [SessionsRoomController::class, "show"])
        ->name('sessionRoomShow');
        Route::get('sessoes-de-filmes/{sessionRoom}/edit', [SessionsRoomController::class, "edit"])
        ->name('sessionRoomEdit');
        Route::put('sessoes-de-filmes/{sessionRoom}', [SessionsRoomController::class, "update"])
        ->name('sessionRoomUpdate');
        Route::delete('sessoes-de-filmes/{sessionRoom}', [SessionsRoomController::class, "destroy"])
        ->name('sessionRoomDestroy');

        //Salas:
        Route::get('rooms/index', [RoomsController::class, "index"])->name('rooms');
        Route::get('room/create', [RoomsController::class, "create"])->name('roomCreate');
        Route::post('room/store', [RoomsController::class, "store"])->name('roomStore');
        Route::post('room/{room}/show', [RoomsController::class, "show"])->name('roomShow');
        Route::get('room/{room}/edit', [RoomsController::class, "edit"])->name('roomEdit');
        Route::put('room/{room}', [RoomsController::class, "update"])->name('roomUpdate');
        Route::delete('room/{room}', [RoomsController::class, "destroy"])->name('roomDestroy');
    });
});
