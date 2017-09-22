<?php

use App\Role;
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
        //global admin
        DB::table('roles')->delete();
        $role = new Role([
            'name' => 'global_admin',
            'display_name' => 'Global Administrator',
            'description' => 'Full controller',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $role->save();

        //admin
        $role = new Role([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => null,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $role->save();

        //Owner
        $role = new Role([
            'name' => 'owner',
            'display_name' => 'Owner',
            'description' => null,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $role->save();

        //manager
        $role = new Role([
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => null,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $role->save();

        //reception
        $role = new Role([
            'name' => 'reception',
            'display_name' => 'Reception',
            'description' => null,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $role->save();

        //therapist
        $role = new Role([
            'name' => 'therapist',
            'display_name' => 'Therapist',
            'description' => null,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $role->save();
    }
}
