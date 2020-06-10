<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_statuses')->insert([
          [
            'id' => 1,
            'name' => 'Conceptual Stage'
          ],
          [
            'id' => 2,
            'name' => 'Proposed'
          ],
          [
            'id' => 3,
            'name' => 'Approved but not yet ongoing'
          ],
          [
            'id' => 4,
            'name' => 'Ongoing'
          ],
          [
            'id' => 5,
            'name' => 'Temporarily Stopped'
          ],
          [
            'id' => 6,
            'name' => 'Cancelled/Terminated'
          ],
          [
            'id' => 7,
            'name' => 'Completed'
          ],
          [
            'id' => 8,
            'name' => 'Dropped from pipeline'
          ]
        ]);
    }
}
