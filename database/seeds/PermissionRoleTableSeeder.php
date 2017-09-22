<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permission_role')->delete();
        $p_role = new \App\PermissionRole([
            'permission_id' => 1,
            'role_id'       => 1,
        ]);
        $p_role->save();

        $p_role = new \App\PermissionRole([
            'permission_id' => 2,
            'role_id'       => 1,
        ]);
        $p_role->save();

        $p_role = new \App\PermissionRole([
            'permission_id' => 3,
            'role_id'       => 1,
        ]);
        $p_role->save();
    }
}
