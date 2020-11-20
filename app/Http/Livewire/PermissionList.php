<?php

namespace App\Http\Livewire;

use App\Repositories\PermissionRepository;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    private $permissionRepository;
    public $search;
    public $actionId = array();


    public function __construct()
    {
        $this->permissionRepository = new PermissionRepository();

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
        return redirect()->route('admin.userManagement.processPermission',['id'=>$this->actionId[0] ]);
    }

    public function delete()
    {
        $this->permissionRepository->delete($this->actionId);
    }


    public function render()
    {
        return view('livewire.permission-list', [
            'permissions' => $this->permissionRepository->getPermissionViaLivewire($this->search),
        ]);
    }
}
