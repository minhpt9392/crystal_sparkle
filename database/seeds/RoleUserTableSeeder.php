<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_user')->delete();
        $role = new \App\RoleUser([
            'role_id' => 1,
            'user_id' => 1,
        ]);
        $role->save();
    }
}
