<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use App\Http\Requests\RoleFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private $userRepository;
    private $permissionRepository;
    private $roleRepository;

    public function __construct(UserRepositoryContract $userRepositoryContract,
                                PermissionRepositoryContract $permissionRepositoryContract,
                                RoleRepositoryContract $roleRepositoryContract)
    {
        $this->userRepository = $userRepositoryContract;
        $this->permissionRepository = $permissionRepositoryContract;
        $this->roleRepository = $roleRepositoryContract;
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function organisations()
    {
        return view('admin.organisations.index');
    }



    public function profile()
    {
        return view('admin.profile', [
            'user' => $this->userRepository->findUserById(false),
        ]);
    }

    public function profile_store(ProfileFormRequest $request)
    {
        $this->userRepository->save_profile($request);
        return redirect()->route('admin.profile');
    }



    public function index()
    {
        return view('admin.management.user.users.index');
    }

    public function process_user($id = false)
    {
        return view('admin.management.user.users.process',[
            'userInfo' => $this->userRepository->findViaId($id),
            'roles' => $this->roleRepository->getRoles(),
        ]);
    }
    public function process_user_store(UserFormRequest $request)
    {
        $this->userRepository->save($request);
        return redirect()->route('admin.users.index');
    }
}
