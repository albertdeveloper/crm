<?php
namespace App\Repositories;

use App\Models\Lead;

class LeadRepository implements LeadRepositoryContract
{
    public function getAll()
    {
        return Lead::get();
    }

    public function findById($id = false)
    {
        if(!$id) return;
        return Lead::findOrFail($id);
    }
}
