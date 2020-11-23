<?php

namespace App\Repositories;

interface LeadRepositoryContract
{
    public function getAll();
    public function findById($id = false);
}
