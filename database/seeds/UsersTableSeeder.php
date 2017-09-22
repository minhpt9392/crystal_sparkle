<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();
        //global admin
        $user = new User([
            'name' => 'Customer',
            'username' => 'customer',
            'phone_number' => '0123456789',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456'),
            'id_number' => '123123123',
            'birthday' => date('Y-m-d'),
            'gender' => 'male',
            'address' => null,
            'postcode' => 10000,
            'nationality_id' => 1
        ]);
        $user->save();
    }
}
