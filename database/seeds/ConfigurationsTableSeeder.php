<?php

use App\Role;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->delete();
        $cg = new \App\Models\Configuration([
            'key' => 'survey_form',
            'value' => '1',
        ]);
        $cg->save();


    }
}
