<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GlobalVariabels
{
    public function __construct()
    {
        View::composer('*', function ($view) {
            $view->with('tenantVerify', tenant());
        });
    }

    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
