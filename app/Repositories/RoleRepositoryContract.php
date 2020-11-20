<?php

namespace App\Repositories;

interface RoleRepositoryContract
{
    public function getRoles();
    public function save($request);
    public function delete($ids);
}
