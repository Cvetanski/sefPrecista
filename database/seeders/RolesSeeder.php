<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $settings_permission = Permission::where('slug', 'edit_site_settings')->first();
        $roles_permission = Permission::where('slug', 'edit_roles')->first();
        $role = new Role();
        $role->slug = 'super_admin';
        $role->name = 'Super Administrator';
        $role->save();
        foreach ($permissions as $key => $permission) {
            $role->permissions()->attach($permission);
        }

    }
}
