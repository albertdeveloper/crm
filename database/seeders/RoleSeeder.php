<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create_role = new Role();
        $create_role->id = 1;
        $create_role->title = 'Administrator';
        $create_role->save();


        $permissions = Permission::get();

        foreach ($permissions as $k => $value) {
            if (!in_array($value->id, $create_role->permissions()->pluck('permissions.id')->toArray())) $create_role->permissions()->attach($value->id);
        }
    }
}
