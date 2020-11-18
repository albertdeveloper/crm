<?php
namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    public function getPermissions()
    {
        return Permission::get();
    }
}
