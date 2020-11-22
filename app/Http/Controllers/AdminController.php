<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use App\Http\Requests\RoleFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
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


    //User Management

    public function permissions()
    {
        abort_unless(Gate::allows('user_management_permission_access'), 403);

        return view('admin.management.user.permissions.index', [
            'permissions' => $this->permissionRepository->getPermissions(),
        ]);
    }

    public function process_permission($id = false)
    {
        abort_unless(Gate::allows('user_management_create_permission'),403);
        return view('admin.management.user.permissions.process',[
            'permissionInfo' => $this->permissionRepository->findViaId($id),
        ]);
    }

    public function process_permission_store(PermissionFormRequest $request)
    {
        abort_unless(Gate::allows('user_management_create_permission'),403);
        $this->permissionRepository->save($request);
        return redirect()->route('admin.userManagement.permissions');
    }

    public function roles()
    {
        return view('admin.management.user.roles.index');
    }

    public function process_roles($id = false)
    {
        return view('admin.management.user.roles.process',[
            'permissions' => $this->permissionRepository->getPermissions(),
            'roleInfo'    => $this->roleRepository->findViaId($id),
        ]);
    }

    public function process_roles_store(RoleFormRequest $request)
    {
        $this->roleRepository->save($request);
        return redirect()->route('admin.userManagement.roles');
    }

    public function users()
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
        return redirect()->route('admin.userManagement.users');
    }


}
