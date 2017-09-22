<?php

use App\Role;
use Illuminate\Database\Seeder;

class PackageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package_types')->delete();
        $cg = new \App\Models\PackageType([
            'name' => 'Chine full body',
            'type' => 1,
            'price' => 5,
            'package_range' => 1
        ]);
        $cg->save();



    }
}
