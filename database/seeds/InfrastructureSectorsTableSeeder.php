<?php

use Illuminate\Database\Seeder;

class InfrastructureSectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infrastructure_sectors')->insert([
          [
            'id' => 1,
            'name' => 'Social Infrastructure'
          ],
          [
            'id' => 2,
            'name' => 'Power - Electrification'
          ],
          [
            'id' => 3,
            'name' => 'Transportation'
          ],
          [
            'id' => 4,
            'name' => 'Water Resources'
          ],
          [
            'id' => 5,
            'name' => 'Information and Communications Technology'
          ],
          [
            'id' => 6,
            'name' => 'Others'
          ],
        ]);
    }
}
