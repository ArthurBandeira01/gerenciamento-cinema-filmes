<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserTenant;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function accessUsersMenu($user)
    {
        if ($user instanceof User) {
            return $user->role === 'admin';
        } elseif ($user instanceof UserTenant) {
            return $user->role === 'admin';
        }

        return false;
    }
}
