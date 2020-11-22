<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;
use Illuminate\Support\Facades\Gate;

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
        self::allowed_gate('roles_access');

        return view('admin.management.user.roles.index');
    }

    public function process_roles($id = false)
    {
        self::allowed_gate('permission_process');

        return view('admin.management.user.roles.process', [
            'permissions' => $this->permissionRepository->getPermissions(),
            'roleInfo' => $this->roleRepository->findViaId($id),
        ]);
    }

    public function process_roles_store(RoleFormRequest $request)
    {
        self::allowed_gate('roles_process');

        $this->roleRepository->save($request);
        return redirect()->route('admin.roles.index');
    }

    public static function allowed_gate($ability)
    {
        abort_unless(Gate::allows($ability),403);
    }


}
