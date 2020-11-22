<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use App\Repositories\PermissionRepositoryContract;
use Illuminate\Support\Facades\Gate;


class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryContract $permissionRepositoryContract)
    {
        $this->permissionRepository = $permissionRepositoryContract;
    }

    public function index()
    {
        abort_unless(Gate::allows('user_management_permission_access'), 403);

        return view('admin.management.user.permissions.index', [
            'permissions' => $this->permissionRepository->getPermissions(),
        ]);
    }

    public function process_permission($id = false)
    {
        abort_unless(Gate::allows('user_management_create_permission'), 403);
        return view('admin.management.user.permissions.process', [
            'permissionInfo' => $this->permissionRepository->findViaId($id),
        ]);
    }

    public function process_permission_store(PermissionFormRequest $request)
    {
        abort_unless(Gate::allows('user_management_create_permission'), 403);
        $this->permissionRepository->save($request);
        return redirect()->route('admin.permissions.index');
    }
}
