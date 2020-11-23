<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function findById($id = false);

    public function save_profile($request);

    public function save($id);
}
