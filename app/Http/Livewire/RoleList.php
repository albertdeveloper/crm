<?php

namespace App\Http\Livewire;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Gate;
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

    public function update()
    {
        return redirect()->route('admin.roles.process',['id'=>$this->actionId[0]]);
    }

    public function delete()
    {
        self::allowed_gate('roles_destroy');
        $this->roleRepository->delete($this->actionId);
    }

    public static function allowed_gate($ability)
    {
        abort_unless(Gate::allows($ability),403);
    }

    public function render()
    {
        return view('livewire.role-list', [
                'roles' => $this->roleRepository->getRoles(),
            ]
        );
    }
}
