<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function findUserById($id = false);

    public function save_profile($request);

    public function findViaId($id);

    public function save($id);
}
