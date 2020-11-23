<?php
namespace App\Repositories;

interface PermissionRepositoryContract
{
    public function getPermissions();
    public function save($request);
    public function delete($ids);
    public function getPermissionViaLivewire($request);
    public function findById($id);
}
