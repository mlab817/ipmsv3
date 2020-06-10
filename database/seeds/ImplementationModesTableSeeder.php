<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImplementationModesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('implementation_modes')->insert([
          'id' => 1,
          'name' => 'Through Local Funds in accordance with RA 9184 or the Government Procurement Act'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 2,
          'name' => 'Through ODA pursuant to RA 8182 or the ODA Act of 1996'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 3,
          'name' => 'Through PPP under the Amended BOT Law and Its IRR'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 4,
          'name' => 'Through Joint Venture Arrangement'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 5,
          'name' => 'Others'
        ]);
    }
}
