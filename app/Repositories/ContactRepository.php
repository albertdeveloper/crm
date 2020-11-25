<?php
namespace App\Repositories;

use App\Models\LeadContact;

class ContactRepository implements ContactRepositoryContract
{
    public function updateOrCreate($request,$lead_id)
    {

      $lead_contact =  LeadContact::updateOrCreate(
            ['id' => $request->id],
            [
                'lead_id' => $lead_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'designation' => $request->designation
            ]);
    }

    public function findById($id)
    {
        return LeadContact::findOrFail($id);
    }

    public function getAllViaLivewire($lead_id)
    {
        return LeadContact::where('lead_id',$lead_id)->paginate(10);
    }

    public function setPrimary($contact_id)
    {
        $contact = $this->findById($contact_id);
        $contact->is_primary = 1;
        $contact->save();
    }
}
