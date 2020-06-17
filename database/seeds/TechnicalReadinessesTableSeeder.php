<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicalReadinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technical_readinesses')->insert([
          [
            'id' => 1,
            'name' => 'Feasibility Studies'
          ],
          [
            'id' => 2,
            'name' => 'Business Case/Plan'
          ],
          [
            'id' => 3,
            'name' => 'Project Proposal'
          ],
          [
            'id' => 4,
            'name' => 'Concept Note'
          ],
          [
            'id' => 6,
            'name' => 'Detailed Engineering Design'
          ],
          [
            'id' => 7,
            'name' => 'Right of Way'
          ],
          [
            'id' => 8,
            'name' => 'Resettlement Action Plan'
          ],
          [
            'id' => 5,
            'name' => 'Others'
          ]
        ]);
    }
}
