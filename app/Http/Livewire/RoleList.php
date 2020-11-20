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
    public $actionId;


    public function __construct()
    {
        $this->roleRepository = new RoleRepository();
    }

    public function setForAction($id)
    {
        $this->actionId = $id;
    }

    public function view()
    {

    }

    public function update()
    {
        return redirect()->route('admin.userManagement.processRoles',['id'=>$this->actionId]);
    }

    public function delete()
    {
        $this->permissionRepository->delete($this->actionId);
    }

    public function render()
    {
        return view('livewire.role-list', [
                'roles' => $this->roleRepository->getRoles(),

            ]
        );
    }
}
