<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use App\Http\Requests\RoleFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;

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

    public function users()
    {
        return view('admin.users.index');
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
        return view('admin.management.user.permissions.index', [
            'permissions' => $this->permissionRepository->getPermissions(),
        ]);
    }

    public function create_permission()
    {
        return view('admin.management.user.permissions.create');
    }

    public function create_permission_store(PermissionFormRequest $request)
    {
        $this->permissionRepository->save($request);
        return redirect()->route('admin.userManagement.permissions');
    }

    public function roles()
    {
        return view('admin.management.user.roles.index');
    }

    public function create_roles()
    {
        return view('admin.management.user.roles.create');
    }

    public function create_roles_store(RoleFormRequest $request)
    {
        $this->roleRepository->save($request);
        return redirect()->route('admin.userManagement.roles');
    }
}
