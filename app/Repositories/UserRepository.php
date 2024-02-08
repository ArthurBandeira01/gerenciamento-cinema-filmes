<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    protected $entity;

    public function __construct(User $User)
    {
        $this->entity = $User;
    }

    public function getAllUsers()
    {
        return $this->entity->paginate();
    }

    public function getUserById($id): object
    {
        return $this->entity->where('id', $id)->first();
    }

    public function createUser(array $User): object
    {
        return $this->entity->create($User);
    }

    public function updateUser($User, $user)
    {
        return $User->update($user);
    }

    public function destroyUser($user)
    {
        return $user->delete();
    }
}
