<?php
namespace App\Repositories;

interface PermissionRepositoryContract
{
    public function getPermissions();
    public function save($request);
}
