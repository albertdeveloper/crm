<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Helper\Helper;


class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryContract $permissionRepositoryContract)
    {
        $this->permissionRepository = $permissionRepositoryContract;
    }

    public function index()
    {
        Helper::allowed_gate('permission_access');

        return view('admin.management.user.permissions.index', [
            'permissions' => $this->permissionRepository->getPermissions(),
        ]);
    }

    public function process_permission($id = false)
    {
        Helper::allowed_gate('permission_process');

        return view('admin.management.user.permissions.process', [
            'permissionInfo' => $this->permissionRepository->findById($id),
        ]);
    }

    public function process_permission_store(PermissionFormRequest $request)
    {
        Helper::allowed_gate('permission_process');
        $this->permissionRepository->save($request);
        return redirect()->route('admin.permissions.index');
    }
}
