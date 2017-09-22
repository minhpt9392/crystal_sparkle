<?php

use App\Role;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->delete();
        $cg = new \App\Models\Shop([
            'business_name' => 'Shop 1',
            'logo' => 'fa-clock-o',
        ]);
        $cg->save();

        $cg = new \App\Models\Shop([
            'business_name' => 'Shop 2',
            'logo' => 'fa-cart-arrow-down',
        ]);
        $cg->save();

        $cg = new \App\Models\Shop([
            'business_name' => 'Shop 3',
            'logo' => 'fa-globe',
        ]);
        $cg->save();

        $cg = new \App\Models\Shop([
            'business_name' => 'Shop 4',
            'logo' => 'fa-user-secret',
        ]);
        $cg->save();

        $cg = new \App\Models\Shop([
            'business_name' => 'Shop 5',
            'logo' => 'fa-calendar-minus-o',
        ]);
        $cg->save();

    }
}
