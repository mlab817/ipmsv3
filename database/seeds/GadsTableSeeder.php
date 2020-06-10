<?php

use Illuminate\Database\Seeder;

class GadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('gads')->insert([
            [
                'id' => 1,
                'name' => 'GAD is invisible in the project'
            ],
            [
                'id' => 2,
                'name' => 'Proposed project has promising prospects'
            ],
            [
                'id' => 3,
                'name' => 'Proposed project is gender-sensitive'
            ],
            [
                'id' => 4,
                'name' => 'Proposed project is gender-responsive'
            ],
        ]);
    }
}
