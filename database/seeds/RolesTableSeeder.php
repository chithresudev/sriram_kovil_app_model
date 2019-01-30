<?php

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = Role::create(['name' => 'root']);
        $pre_admin = Role::create(['name' => 'pre_admin']);
        $pre_user = Role::create(['name' => 'pre_user']);
        $user = Role::create(['name' => 'user']);
        $camp_admin = Role::create(['name' => 'camp_admin']);
    }
}
