<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UserAccessTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('userAccessTenant')) {
            $userId = Session::get('userAccessTenant');
            $user = User::find($userId);
            if ($user) {
                return $next($request);
            } else {
                return redirect()->route('loginTenant')->with('error', 'Você não possui acesso à área administrativa!');
            }
        }

        return redirect()->route('loginTenant')->with('error', 'Você não possui acesso à área administrativa!');
    }
}
