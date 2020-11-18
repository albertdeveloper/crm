<?php
namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    public function getPermissions()
    {
        return Permission::orderBy('created_at','desc')->get();
    }

    public function save($request)
    {
        Permission::updateOrCreate(
            ['id' => $request->id],
            ['title' => $request->title]);
    }

}
