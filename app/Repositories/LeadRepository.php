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
        if(!$id) return;
        return Lead::findOrFail($id);
    }

    public function process($request)
    {
       $processed_lead =  Lead::updateOrCreate(
            ['id' => $request->id],
            [
                'company' => $request->company,
                'phone' => $request->phone,
                'email' => $request->email,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'zipcode' => $request->zipcode,
                'website' => $request->website,
                'country' => $request->country
            ]);
    }

    public function destroy($ids)
    {
        if(sizeof($ids) == 0) return;
        Lead::whereIn('id',$ids)->delete();
    }

    public function getLeadSources()
    {
        return LeadSource::get();

    }


}
