<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
          [
            'id' => 1,
            'name' => 'Program',
            'label' => 'Program'
          ],
          [
            'id' => 2,
            'name' => 'Project',
            'label' => 'Project'
          ]
        ]);
    }
}
