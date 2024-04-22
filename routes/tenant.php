<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SessionsRoomsController;
use App\Http\Controllers\SessionsClientsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Session\Middleware\StartSession;


Route::middleware(['web', 'global.variables', InitializeTenancyByDomain::class,
PreventAccessFromCentralDomains::class])->group(function () {
    Route::get('/', [SiteController::class, "index"])->name('index');
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
        Route::get('usuario/{user}/edit', [UserController::class, "edit"])->name('usersTenantEdit');
        Route::put('usuario/{user}', [UserController::class, "update"])->name('usersTenantUpdate');
        Route::delete('usuario/{user}', [UserController::class, "destroy"])->name('usersTenantDestroy');

        //Salas:
        Route::get('salas/index', [RoomsController::class, "index"])->name('rooms');
        Route::get('sala/create', [RoomsController::class, "create"])->name('roomCreate');
        Route::post('sala/store', [RoomsController::class, "store"])->name('roomStore');
        Route::get('sala/{room}/edit', [RoomsController::class, "edit"])->name('roomEdit');
        Route::put('sala/{room}', [RoomsController::class, "update"])->name('roomUpdate');
        Route::delete('sala/{room}', [RoomsController::class, "destroy"])->name('roomDestroy');

        //Salas de sessões:
        Route::get('sessoes-de-filmes/index', [SessionsRoomsController::class, "index"])->name('sessionRoom');
        Route::get('sessoes-de-filmes/create', [SessionsRoomsController::class, "create"])->name('sessionRoomCreate');
        Route::post('sessoes-de-filmes/store', [SessionsRoomsController::class, "store"])->name('sessionRoomStore');
        Route::get('sessoes-de-filmes/{sessionRoom}/edit', [SessionsRoomsController::class, "edit"])
        ->name('sessionRoomEdit');
        Route::put('sessoes-de-filmes/{sessionRoom}', [SessionsRoomsController::class, "update"])
        ->name('sessionRoomUpdate');
        Route::delete('sessoes-de-filmes/{sessionRoom}', [SessionsRoomsController::class, "destroy"])
        ->name('sessionRoomDestroy');

        //Clientes da sessão:
        Route::get('cliente-de-sessao/index', [SessionsClientsController::class, "index"])->name('sessionClient');
        Route::get('cliente-de-sessao/create', [SessionsClientsController::class, "create"])
        ->name('sessionClientCreate');
        Route::post('cliente-de-sessao/store', [SessionsClientsController::class, "store"])->name('sessionClientStore');
        Route::get('cliente-de-sessao/{sessionRoom}/edit', [SessionsClientsController::class, "edit"])
        ->name('sessionClientEdit');
        Route::put('cliente-de-sessao/{sessionRoom}', [SessionsClientsController::class, "update"])
        ->name('sessionClientUpdate');
        Route::delete('cliente-de-sessao/{sessionRoom}', [SessionsClientsController::class, "destroy"])
        ->name('sessionClientDestroy');
    });
});
