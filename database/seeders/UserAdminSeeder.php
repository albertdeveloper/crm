<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'Ross Albert M. Gonzales';
        $user->email = 'rossalbertgonzales@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        //administrator role
        $user->roles()->sync('1');

    }
}
