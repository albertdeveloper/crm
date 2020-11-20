<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository implements RoleRepositoryContract
{
    public function getRoles()
    {
        return Role::paginate();
    }

    public function save($request)
    {
        $create_role = Role::create(['title' => $request->title]);
        //set permissions to role
        if (isset($request->permissions) && sizeOf($request->permissions) > 0) {
            foreach ($request->permissions as $k => $value) $create_role->permissions()->attach((int)$value);
        }
    }
}
