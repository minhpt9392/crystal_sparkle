<?php

use App\Role;
use Illuminate\Database\Seeder;

class DurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('durations')->delete();
        $cg = new \App\Models\Duration([
            'minutes' => 60,
            'display' => '60 mins',
        ]);
        $cg->save();

        $cg = new \App\Models\Duration([
            'minutes' => 10,
            'display' => '10 mins',
        ]);
        $cg->save();

    }
}
