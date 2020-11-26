<?php

namespace App\Http\View\Composers;

use  App\Repositories\LeadRepositoryContract;
use Illuminate\View\View;

class LeadsComposer
{

    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $leads;

    /**
     * Create a new profile composer.
     *
     * @param LeadRepositoryContract $leadRepositoryContract
     */
    public function __construct(LeadRepositoryContract $leadRepositoryContract)
    {
        $this->leads = $leadRepositoryContract;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('leads', $this->leads->getTodayLeads());
    }
}
