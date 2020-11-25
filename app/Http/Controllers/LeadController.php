<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\LeadFormRequest;
use App\Repositories\LeadRepositoryContract;
use Illuminate\Http\Request;

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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function process_leads_store(LeadFormRequest $request)
    {
        Helper::allowed_gate('leads_process');
        $this->leadRepository->process($request);
        return redirect()->route('admin.leads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
