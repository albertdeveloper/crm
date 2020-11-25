<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Models\LeadSource;

class LeadRepository implements LeadRepositoryContract
{
    public function getAllViaLivewire()
    {
        return Lead::paginate();
    }

    public function findById($id = false)
    {
        if (!$id) return;
        return Lead::findOrFail($id);
    }

    public function process($request)
    {
        return Lead::updateOrCreate(
            ['id' => $request->id],
            [
                'owner' => $request->owner,
                'company' => $request->company,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'email' => $request->email,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'mobile' => $request->mobile,
                'website' => $request->website,
                'lead_source_id' => $request->lead_source,
                'lead_status' => $request->lead_status,
                'industry' => $request->industry,
                'no_employees' => $request->no_employees,
                'annual_revenue' => $request->annual_revenue,
                'rating' => $request->rating,

                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'zipcode' => $request->zipcode,
                'country' => $request->country
            ]);
    }

    public function destroy($ids)
    {
        if (sizeof($ids) == 0) return;
        Lead::whereIn('id', $ids)->delete();
    }

    public function getLeadSources()
    {
        return LeadSource::get();

    }
}
