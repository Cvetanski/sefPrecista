<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_role = Role::where('slug','super_admin')->first();

        $user = new User();
        $user->password = Hash::make('shiftradio@@1##');
        $user->email = 'precista@admin.com';
        $user->username = 'precista';
        $user->first_name = 'Darko';
        $user->last_name = 'Cvetanoski';

        $user->save();
        $user->roles()->attach($super_admin_role);
    }
}
