<?php

namespace App\Repositories;

use App\Models\Permission;
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
        if ($request->permissions !== null || $request->set_all !== null) {
            $permissions = ($request->set_all !== null) ? Permission::get() : $request->permissions;
            foreach ($permissions as $k => $value) $create_role->permissions()->attach($value ?? $value->id);
        }
    }
    public function findViaId($id)
    {
        if(!$id) return [];
        return Role::find($id);
    }
}
