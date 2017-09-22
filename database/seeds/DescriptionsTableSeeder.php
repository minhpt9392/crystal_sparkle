<?php

use App\Role;
use Illuminate\Database\Seeder;

class DescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descriptions')->delete();
        $cg = new \App\Models\Description([
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae dui a odio maximus ultricies. Cras rhoncus diam eget porta gravida. Vivamus est lectus, facilisis quis dictum vitae, elementum id risus. Phasellus a ligula vitae odio vehicula sagittis ut ac odio. Aliquam nec lorem orci. Nulla mauris lectus, sagittis sed ante eu, varius porta lorem. Suspendisse tincidunt ex sit amet pulvinar tristique. Nam eget nisl in sem dapibus hendrerit. Aenean ac enim a risus pretium mollis. Curabitur vitae nisi sit amet lacus viverra aliquet vel eu magna. Nam sollicitudin, felis quis laoreet efficitur, metus quam faucibus lorem, eu pretium arcu diam ac massa. Sed laoreet bibendum purus, vitae efficitur justo rutrum ac. Quisque eu varius dolor.',
        ]);
        $cg->save();

    }
}
