<?php
namespace App\Repositories;

interface PermissionRepositoryContract
{
    public function getPermissions();
    public function save($request);
    public function delete($id);
    public function getPermissionViaLivewire($request);
}
