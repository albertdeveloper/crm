<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Repositories\ContactRepositoryContract;
use App\Repositories\LeadRepositoryContract;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $leadRepository;

    private $contactRepository;

    public function __construct(LeadRepositoryContract $leadRepositoryContract,ContactRepositoryContract $contactRepositoryContract)
    {
        $this->leadRepository = $leadRepositoryContract;
        $this->contactRepository = $contactRepositoryContract;
    }

    public function index($lead_id)
    {
        $this->leadRepository->findById($lead_id);

        return view('admin.leads.contacts.index',[
            'lead_id' => $lead_id,
        ]);
    }

    public  function process($lead_id, $id = false)
    {
        return view('admin.leads.contacts.process',[
            'contactInfo' => '',
            'leadInfo'    => $this->leadRepository->findById($lead_id),
        ]);
    }

    public function store(ContactFormRequest $request,$lead_id, $id = false)
    {
        $this->leadRepository->findById($lead_id);
        $this->contactRepository->updateOrCreate($request,$lead_id);
        return redirect()->route('admin.leads.contact',['lead_id' => $lead_id])->with('toast','Successfully added contact');
    }

}
