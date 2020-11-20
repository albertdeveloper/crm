<?php
namespace App\Repositories;


use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    public function getPermissions()
    {
        return Permission::orderBy('created_at','desc')->paginate(2);
    }

    public function findViaId($id)
    {
        return Permission::findOrFail($id);
    }

    public function save($request)
    {
        Permission::updateOrCreate(
            ['id' => $request->id],
            ['title' => $request->title]);
    }

    public function delete($id)
    {
        $this->findViaId($id)->delete();
    }

}
