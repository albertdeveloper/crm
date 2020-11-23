<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\UserRepositoryContract;
use App\Helper\Helper;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepositoryContract $userRepositoryContract,
                                RoleRepositoryContract $roleRepositoryContract)
    {
        $this->userRepository = $userRepositoryContract;
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

        Helper::allowed_gate('profile_process');
        return view('admin.profile', [
            'user' => $this->userRepository->findUserById(false),
        ]);
    }

    public function profile_store(ProfileFormRequest $request)
    {
        Helper::allowed_gate('profile_process');
        $this->userRepository->save_profile($request);
        return redirect()->route('admin.profile');
    }

    public function index()
    {
        Helper::allowed_gate('users_access');
        return view('admin.management.user.users.index');
    }

    public function process_user($id = false)
    {
        Helper::allowed_gate('users_process');
        return view('admin.management.user.users.process', [
            'userInfo' => $this->userRepository->findViaId($id),
            'roles' => $this->roleRepository->getRoles(),
        ]);
    }

    public function process_user_store(UserFormRequest $request)
    {
        Helper::allowed_gate('users_process');

        $this->userRepository->save($request);
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        Helper::allowed_gate('users_destroy');
        $this->userRepository->delete($id);
    }
}
