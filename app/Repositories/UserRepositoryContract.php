<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function findById($id);
    public function findProfileInfo();
    public function save_profile($request);
    public function save($id);
}
