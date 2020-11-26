<?php

namespace App\Repositories;

interface LeadRepositoryContract
{
    public function getAllViaLivewire();
    public function findById($id = false);
    public function process($request);
    public function getLeadSources();
    public function destroy($id);
    public function getTodayLeads();
}
