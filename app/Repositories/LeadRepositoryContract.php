<?php

namespace App\Repositories;

interface LeadRepositoryContract
{
    public function getAllViaLivewire($search = false,$lead_type);
    public function findById($id = false);
    public function process($request);
    public function getLeadSources();
    public function destroy($id);
    public function getTodayLeads();
    public function getLeadStatus();
    public function convert($id);
}
