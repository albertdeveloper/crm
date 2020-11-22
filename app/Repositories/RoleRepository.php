<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Role;

class RoleRepository implements RoleRepositoryContract
{
    public function getRoles()
    {
        return Role::paginate(10);
    }

    public function save($request)
    {
        $create_role = Role::updateOrCreate(
            ['id' => $request->id],
            ['title' => $request->title],
        );
        //set permissions to role
        if ($request->permissions !== null || $request->set_all !== null) {
            $permissions = ($request->set_all !== null) ? Permission::get() : $request->permissions;

            foreach ($permissions as $k => $value) {
                //check if already existing
                $real_value = $value->id ?? $value;
                if (!in_array($real_value, $create_role->permissions()->pluck('permissions.id')->toArray()))  $create_role->permissions()->attach($real_value);
            }
        }
    }
    public function findViaId($id)
    {
        if(!$id) return;
        return Role::find($id);
    }

    public function delete($ids)
    {
        if(sizeof($ids) == 0) return;
        Role::whereIn('id',$ids)->delete();
    }
}
