<?php

namespace App\Repositories\Contracts;

interface UserTenantRepositoryInterface
{
    public function getAllUsersTenant();
    public function getUserTenantById($id);
    public function createUserTenant(array $userTenant);
    public function updateUserTenant(int $id, array $userTenant);
    public function destroyUserTenant(int $id);
}
