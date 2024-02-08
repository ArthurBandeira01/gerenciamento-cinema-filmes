<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserTenantRepositoryInterface;
use App\Models\UserTenant;


class UserTenantRepository implements UserTenantRepositoryInterface
{

    protected $entity;

    public function __construct(UserTenant $UserTenant)
    {
        $this->entity = $UserTenant;
    }

    public function getAllUsersTenant()
    {
        return $this->entity->paginate();
    }

    public function getUserTenantById($id): object
    {
        return $this->entity->where('id', $id)->first();
    }

    public function createUserTenant($userTenant): object
    {
        return $this->entity->create($userTenant);
    }

    public function updateUserTenant($UserTenant, $userTenant): object
    {
        return $UserTenant->update($userTenant);
    }

    public function destroyUserTenant($userTenant)
    {
        return $userTenant->delete();
    }
}
