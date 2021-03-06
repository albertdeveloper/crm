<?php

namespace App\Http\Livewire;

use App\Helper\Helper;
use App\Repositories\LeadRepository;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    private $leadRepository;
    public $search;
    public $actionId = array();
    public $actionBox;

    public function __construct()
    {
        $this->leadRepository = new LeadRepository();

    }

    public function setForAction($id)
    {
        if(!in_array($id,$this->actionId)) $this->actionId[] = $id;
        else {
            $existing  = array_search($id,$this->actionId);
            unset($this->actionId[$existing]);
        }
    }

    public function update()
    {

        return redirect()->route('admin.contacts.process',['id'=>$this->actionId[0]]);
    }

    public function show()
    {
        return redirect()->route('admin.contacts.show',['id'=>$this->actionId[0]]);
    }

    public function delete()
    {
        Helper::allowed_gate('leads_destroy');
        $this->leadRepository->destroy($this->actionId);
    }

    public function contacts()
    {
        return redirect()->route('admin.leads.contact',['lead_id' => $this->actionId[0]]);
    }


    public function render()
    {
        return view('livewire.contact-list',[
            'leads' => $this->leadRepository->getAllViaLivewire($this->search,2),
        ]);
    }
}
