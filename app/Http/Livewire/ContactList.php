<?php

namespace App\Http\Livewire;

use App\Repositories\ContactRepository;
use App\Repositories\LeadRepository;
use Livewire\Component;
use Livewire\WithPagination;
class ContactList extends Component
{
    use WithPagination;

    public $lead_id;
    protected $paginationTheme = 'bootstrap';
    private $contactRepository;
    public $search;
    public $actionId = array();



    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
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
        return redirect()->route('admin.permissions.process',['id'=>$this->actionId[0] ]);
    }

    public function setPrimary()
    {
        $this->contactRepository->setPrimary($this->actionId[0]);
    }

    public function delete()
    {
        Help::allowed_gate('permission_destroy');
        $this->contactRepository->delete($this->actionId);
    }

    public function render()
    {

        return view('livewire.contact-list',[
            'leadContacts' => $this->contactRepository->getAllViaLivewire($this->lead_id),
        ]);
    }
}
