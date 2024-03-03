<?php

namespace App\Helpers;

use Auth;
use App\Models\User;

class UsersHelper
{
    public static function getUser()
    {
        //return Auth::guard('users_tenant')->user()->name;
    }
}
