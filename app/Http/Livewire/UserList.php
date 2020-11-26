<?php

namespace App\Http\Livewire;

use App\Helper\Helper;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    private $userRepository;
    public $search;

    public $actionId = array();


    public function __construct()
    {
        $this->userRepository = new UserRepository();
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
        return redirect()->route('admin.users.process',['id'=>$this->actionId[0]]);
    }

    public function delete()
    {
        Helper::allowed_gate('users_destroy');
       $this->userRepository->destroy($this->actionId);
    }


    public function render()
    {
        return view('livewire.user-list',[
            'users' => $this->userRepository->getAllUserForAdminLivewire($this->search) ?? [],
        ]);
    }
}
