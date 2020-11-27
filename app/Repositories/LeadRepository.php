<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use Carbon\Carbon;

class LeadRepository implements LeadRepositoryContract
{
    public function getAllViaLivewire($search = false,$lead_type = 1)
    {
        $query = Lead::query();
        if ($search) {
            $search_field = '%' . $search . '%';
            $query->where(function ($q) use ($search_field) {
                $q->where('company', 'like', $search_field)
                    ->orWhere('email', 'like', $search_field)
                    ->orWhere('phone', 'like', $search_field);
            });
        }
        $query->where('lead_type',$lead_type);
        $query->orderBy('created_at','desc');
        return $query->paginate();
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
                'user_id' => auth()->user()->id,
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
                'lead_status_id' => $request->lead_status,
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
        if(!is_array($ids))  $ids = array($ids);
        if (sizeof($ids) == 0) return;
        Lead::whereIn('id', $ids)->delete();
    }

    public function getLeadSources()
    {
        return LeadSource::get();

    }

    public function getTodayLeads()
    {
        return Lead::whereDate('created_at', Carbon::today())->get();
    }

    public function getLeadStatus()
    {
        return LeadStatus::get();
    }

    public function convert($id)
    {
        $this->findById($id);
        $lead = Lead::find($id);
        $lead->lead_type = 2;
        $lead->save();
    }
}
