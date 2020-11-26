<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\LeadFormRequest;
use App\Repositories\LeadRepositoryContract;

class LeadController extends Controller
{
    private $leadRepository;

    public function __construct(LeadRepositoryContract $leadRepositoryContract)
    {
        $this->leadRepository = $leadRepositoryContract;
    }

    public function index()
    {
        Helper::allowed_gate('leads_access');

        return view('admin.leads.index');
    }

    /**w
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function process($id = false)
    {
        Helper::allowed_gate('leads_process');
        return view('admin.leads.process', [
            'leadInfo' => $this->leadRepository->findById($id),
            'leadSources' => $this->leadRepository->getLeadSources(),
            'leadStatus' => $this->leadRepository->getLeadStatus(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadFormRequest $request)
    {
        Helper::allowed_gate('leads_process');
        $leads = $this->leadRepository->process($request);
        return redirect()->route('admin.leads.show',['id' => $leads->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Helper::allowed_gate('leads_show');

        return view('admin.leads.show',[
            'lead_data' => $this->leadRepository->findById($id),
        ]);
    }

    public function destroy($id)
    {
        Helper::allowed_gate('leads_destroy');
        $this->leadRepository->findById($id);
        $this->leadRepository->destroy($id);
        return redirect()->route('admin.leads.index');
    }

    public function convert($id)
    {
        return view('admin.leads.convert',[
            'lead_data' => $this->leadRepository->findById($id),
        ]);
    }

}
