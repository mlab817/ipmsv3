<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessingStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('processing_statuses')->insert([
            [
                'id' => 1,
                'name' => 'draft'
            ],
            [
                'id' => 2,
                'name' => 'finalized'
            ],
            [
                'id' => 3,
                'name' => 'endorsed'
            ],
            [
                'id' => 4,
                'name' => 'returned'
            ],
            [
                'id' => 5,
                'name' => 'validated'
            ],
            [
                'id' => 6,
                'name' => 'reviewed'
            ],
            [
                'id' => 7,
                'name' => 'accepted'
            ],
            [
                'id' => 8,
                'name' => 'approved'
            ],
            [
                'id' => 9,
                'name' => 'encoded'
            ]
        ]);
    }
}
