<?php

namespace App\Http\Livewire;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Livewire\Component;
use Livewire\WithPagination;

class RoleList extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    private $roleRepository;

    public $actionId = array();


    public function __construct()
    {
        $this->roleRepository = new RoleRepository();
    }

    public function setForAction($id)
    {
        if(!in_array($id,$this->actionId)) $this->actionId[] = $id;
        else {
            $existing  = array_search($id,$this->actionId);
            unset($this->actionId[$existing]);
        }
    }

    public function view()
    {

    }

    public function update()
    {
        return redirect()->route('admin.userManagement.processRoles',['id'=>$this->actionId[0]]);
    }

    public function delete()
    {
        $this->roleRepository->delete($this->actionId);
    }

    public function render()
    {
        return view('livewire.role-list', [
                'roles' => $this->roleRepository->getRoles(),
            ]
        );
    }
}
