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
            'name' => 'Concept Note'
          ],
          [
            'id' => 2,
            'name' => 'Project Proposal'
          ],
          [
            'id' => 3,
            'name' => 'Detailed Engineering Design'
          ],
          [
            'id' => 4,
            'name' => 'Business Plan'
          ],
          [
            'id' => 5,
            'name' => 'Feasibility Studies'
          ],
          [
            'id' => 6,
            'name' => 'Right of Way'
          ],
          [
            'id' => 7,
            'name' => 'Resettlement Action Plan'
          ],
        ]);
    }
}
