<?php

namespace App\Repositories;

interface RoleRepositoryContract
{
    public function getRoleViaLivewire($search_field);
    public function getRoles();
    public function save($request);
    public function delete($ids);
    public function findById($ids);
}
