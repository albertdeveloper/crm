<?php
namespace App\Repositories;

use App\Models\Organisation;

class OrganisationRepository implements OrganisationRepositoryContract
{
    public function getAll()
    {
        return Organisation::get();
    }
}
