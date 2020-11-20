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
        Role::updateOrCreate(
            ['id' => $request->id ],
            ['title' => $request->title]);
    }

}
