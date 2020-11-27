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
            'user_management_access',
            'users_destroy',
            'users_process',
            'users_access',
            'roles_destroy',
            'roles_process',
            'roles_access',
            'permission_destroy',
            'permission_process',
            'permission_access',
            'profile_access',
            'leads_access',
            'leads_process',
            'leads_destroy',
            'leads_show',
            'list_filters',
            'leads_convert_process',
            'contacts_process',
            'contacts_access'
        );


        foreach ($list_default_permissions as $k => $val) {
            Permission::updateOrcreate(
                ['id' => 0], [
                'title' => $val
            ]);
        }

    }
}
