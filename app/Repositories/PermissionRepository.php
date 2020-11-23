<?php
namespace App\Repositories;


use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    public function getPermissionViaLivewire($search_field)
    {
        $query =  Permission::query();
        if($search_field) $query->where('title','like','%'.$search_field.'%');
        $query->orderBy('created_at','desc');

        return $query->paginate(10);
    }

    public function getPermissions()
    {
        return Permission::orderBy('created_at','desc')->paginate(10);
    }


    public function findById($id)
    {
        if(!$id) return ;
        return Permission::findOrFail($id);
    }

    public function save($request)
    {
        Permission::updateOrCreate(
            ['id' => $request->id],
            ['title' => $request->title]);
    }

    public function delete($ids)
    {
        if(sizeof($ids) == 0) return;
        Permission::whereIn('id',$ids)->delete();
    }

}
