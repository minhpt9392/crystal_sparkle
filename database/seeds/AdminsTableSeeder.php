<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->delete();
        //global admin
        $admin = new Admin([
            'name' => 'Global Admin',
            'username' => 'global_admin',
            'phone_number' => '0123456789',
            'email' => 'global_admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $admin->save();

        //admin
        $admin = new Admin([
            'name' => 'Admin',
            'username' => 'admin',
            'phone_number' => '0123456788',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $admin->save();

        //owner
        $admin = new Admin([
            'name' => 'Owner',
            'username' => 'owner',
            'phone_number' => '0123456787',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $admin->save();

        //manager
        $admin = new Admin([
            'name' => 'Manager',
            'username' => 'manager',
            'phone_number' => '0123456786',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $admin->save();

        //reception
        $admin = new Admin([
            'name' => 'Reception',
            'username' => 'reception',
            'phone_number' => '0123456785',
            'email' => 'reception@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $admin->save();

        //therapist
        $admin = new Admin([
            'name' => 'Therapist',
            'username' => 'therapist',
            'phone_number' => '0123456784',
            'email' => 'therapist@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $admin->save();
    }
}
