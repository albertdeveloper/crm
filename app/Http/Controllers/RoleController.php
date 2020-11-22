<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;

class RoleController extends Controller
{
    private $permissionRepository;
    private $roleRepository;

    public function __construct(PermissionRepositoryContract $permissionRepositoryContract,
                                RoleRepositoryContract $roleRepositoryContract)
    {
        $this->permissionRepository = $permissionRepositoryContract;
        $this->roleRepository = $roleRepositoryContract;
    }

    public function index()
    {
        return view('admin.management.user.roles.index');
    }

    public function process_roles($id = false)
    {
        return view('admin.management.user.roles.process', [
            'permissions' => $this->permissionRepository->getPermissions(),
            'roleInfo' => $this->roleRepository->findViaId($id),
        ]);
    }

    public function process_roles_store(RoleFormRequest $request)
    {
        $this->roleRepository->save($request);
        return redirect()->route('admin.userManagement.roles');
    }
}
