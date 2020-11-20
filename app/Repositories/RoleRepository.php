<?php
namespace App\Repositories;

use App\Models\Role;

class RoleRepository implements RoleRepositoryContract
{
    public function getRoles()
    {
        return Role::paginate();
    }
}
