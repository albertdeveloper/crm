<?php
namespace App\Repositories;

use App\Models\Organisation;

class LeadRepository implements LeadRepositoryContract
{
    public function getAll()
    {
        return Organisation::get();
    }
}
