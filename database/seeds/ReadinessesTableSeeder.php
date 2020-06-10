<?php

use Illuminate\Database\Seeder;

class ReadinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('readinesses')->insert([
        	[
        		'id' => 1,
        		'name' => 'Level 1'
        	],
        	[
        		'id' => 2,
        		'name' => 'Level 2'
        	],
        	[
        		'id' => 3,
        		'name' => 'Level 3'
        	],
        	[
        		'id' => 4,
        		'name' => 'Level 4'
        	]
        ]);
    }
}
