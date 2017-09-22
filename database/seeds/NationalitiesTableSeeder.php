<?php

use App\Role;
use Illuminate\Database\Seeder;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();
        $cg = new \App\Models\Nationality([
            'name' => 'English',
            'short' => 'en',
        ]);
        $cg->save();


    }
}
