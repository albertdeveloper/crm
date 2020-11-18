<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $userRepository;
    private $permissionRepository;

    public function __construct(UserRepositoryContract $userRepositoryContract,
                                PermissionRepositoryContract $permissionRepositoryContract)
    {
        $this->userRepository = $userRepositoryContract;
        $this->permissionRepository = $permissionRepositoryContract;
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
        return view('admin.profile',[
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
        return view('admin.management.user.permission.index',[
            'permissions' => $this->permissionRepository->getPermissions(),
        ]);
    }

    public function create_permission(PermissionFormRequest $request)
    {

    }
}
