<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TenantController;

Route::middleware(['global.variables'])->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('home');
    Route::post('/', [LoginController::class, 'login'])->name('login');
    Route::get('/esqueceu-senha', [LoginController::class, "rememberPassword"])->name('rememberPassword');
    Route::post('/esqueceu-senha', [LoginController::class, "tokenRememberPassword"])->name('tokenRememberPassword');
    Route::get('/redefinir-senha/{token?}', [LoginController::class, "resetPassword"])->name('resetPassword');
    Route::post('/redefinir-senha', [LoginController::class, "changePassword"])->name('changePassword');
});

//Rotas admin:
Route::middleware(['auth', 'global.variables'])->group(function(){
    Route::prefix('/admin/')->group(function () {
        Route::get('index', [AdminController::class, "index"])->name('admin');
        Route::post('logout', [LoginController::class, "logout"])->name('logout');

        //Usuarios:
        Route::get('users/index', [UserController::class, "index"])->name('users');
        Route::get('user/create', [UserController::class, "create"])->name('usersCreate');
        Route::post('user/store', [UserController::class, "store"])->name('usersStore');
        Route::post('user/{user}/show', [UserController::class, "show"])->name('usersShow');
        Route::get('user/{user}/edit', [UserController::class, "edit"])->name('usersEdit');
        Route::put('user/{user}', [UserController::class, "update"])->name('usersUpdate');
        Route::delete('user/{user}', [UserController::class, "destroy"])->name('usersDestroy');

        //Tenant raíz:
        Route::get('tenant/index', [TenantController::class, "index"])->name('tenants');
        Route::get('tenant/create', [TenantController::class, "create"])->name('tenantCreate');
        Route::post('tenant/store', [TenantController::class, "store"])->name('tenantStore');
        Route::post('tenant/{tenant}/show', [TenantController::class, "show"])->name('tenantShow');
        Route::get('tenant/{tenant}/edit', [TenantController::class, "edit"])->name('tenantEdit');
        Route::put('tenant/{tenant}', [TenantController::class, "update"])->name('tenantUpdate');
        Route::delete('tenant/{tenant}', [TenantController::class, "destroy"])->name('tenantDestroy');

    });
});
