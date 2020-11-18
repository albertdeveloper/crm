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
    public $actionId;


    public function __construct()
    {
        $this->permissionRepository = new PermissionRepository();

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

    }

    public function delete()
    {
        $this->permissionRepository->delete($this->actionId);
    }


    public function render()
    {
        return view('livewire.permission-list', [
            'permissions' => $this->permissionRepository->getPermissions(),
        ]);
    }
}
