<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct(UserRepositoryContract $userRepositoryContract,
                                PermissionRepositoryContract $permissionRepositoryContract,
                                RoleRepositoryContract $roleRepositoryContract)
    {
        $this->userRepository = $userRepositoryContract;
        $this->permissionRepository = $permissionRepositoryContract;
        $this->roleRepository = $roleRepositoryContract;
    }

    public function index()
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

}
