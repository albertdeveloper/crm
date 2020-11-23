<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_default_permissions = array(
            1 => 'user_management_access',
            2 => 'users_destroy',
            3 => 'users_process',
            4 => 'users_access',
            5 => 'roles_destroy',
            6 => 'roles_process',
            7 => 'roles_access',
            8 => 'permission_destroy',
            9 => 'permission_process',
            10 => 'permission_access',
            11 => 'profile_process',
        );


        foreach($list_default_permissions as $k => $val)
        {
            Permission::updateOrcreate(
                ['id' => 0],[
                'id' => $k,
                'title' => $val
            ]);
        }

    }
}
