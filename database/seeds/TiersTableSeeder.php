<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiers')->insert([
          'id' => 1,
          'name' => 'Tier 1'
        ]);

        DB::table('tiers')->insert([
          'id' => 2,
          'name' => 'Tier 2 (New)'
        ]);

        DB::table('tiers')->insert([
          'id' => 3,
          'name' => 'Tier 2 (Expanded/Revised)'
        ]);
    }
}
