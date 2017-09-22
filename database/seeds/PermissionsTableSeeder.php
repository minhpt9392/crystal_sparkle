<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->delete();

        //Role
        $role = new \App\Permission([
            'name'          => 'view-role',
            'display_name'  => 'View Role',
            'description'   => 'View Role Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-role',
            'display_name'  => 'Create Role',
            'description'   => 'Create Role'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-role',
            'display_name'  => 'Edit Role',
            'description'   => 'Edit Role'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-role',
            'display_name'  => 'Delete Role',
            'description'   => 'Delete Role'
        ]);
        $role->save();
        //end role

        //
    }
}
