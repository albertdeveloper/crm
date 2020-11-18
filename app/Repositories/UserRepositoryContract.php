<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function findUserById($id = false);

    public function save_profile($request);
}
