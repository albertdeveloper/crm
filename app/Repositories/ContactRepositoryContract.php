<?php

namespace App\Repositories;

interface ContactRepositoryContract
{
    public function updateOrCreate($request,$lead_id);
    public function getAllViaLivewire($lead_id);
}
