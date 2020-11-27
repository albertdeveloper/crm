<?php

namespace App\Repositories;

interface LeadRepositoryContract
{
    public function getAllViaLivewireLeads($search = false);
    public function findById($id = false);
    public function process($request);
    public function getLeadSources();
    public function destroy($id);
    public function getTodayLeads();
    public function getLeadStatus();
    public function convert($id);
}
