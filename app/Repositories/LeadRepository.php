<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Models\LeadSource;
use Carbon\Carbon;

class LeadRepository implements LeadRepositoryContract
{
    public function getAllViaLivewire($search = false)
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

    public function getTodayLeads()
    {
        return Lead::whereDate('created_at', Carbon::today())->get();
    }
}
