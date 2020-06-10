<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;

        for ($i = 0; $i < 30; $i++) {
          DB::table('years')->insert([
            [
              'id' => 2010 + $i,
              'name' => 2010 + $i
            ]
          ]);
        }
    }
}
