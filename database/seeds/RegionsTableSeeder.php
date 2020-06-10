<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('regions')->insert([
        [
            'id' => 13,
            // 'psgc_code' => '130000000',
            'name' => 'National Capital Region',
            'label' => 'NCR',
            // 'slug' => str_slug('National Capital Region'),
            'order' => 3
        ],
        [
            'id' => 14,
            // 'psgc_code' => '140000000',
            'name' => 'Cordillera Administrative Region',
            'label' => 'CAR',
            // 'slug' => str_slug('Cordillera Administrative Region'),
            'order' => 4
        ],
        [
            'id' => 1,
            // 'psgc_code' => '010000000',
            'name' => 'Ilocos Region',
            'label' => 'Region I',
            // 'slug' => str_slug('Ilocos Region'),
            'order' => 5
        ],
        [
            'id' => 2,
            // 'psgc_code' => '020000000',
            'name' => 'Cagayan Valley',
            'label' => 'Region II',
            // 'slug' => str_slug('Cagayan Valley'),
            'order' => 6
        ],
        [
            'id' => 3,
            // 'psgc_code' => '030000000',
            'name' => 'Central Luzon',
            'label' => 'Region III',
            // 'slug' => str_slug('Central Luzon'),
            'order' => 7
        ],
        [
            'id' => 4,
            // 'psgc_code' => '040000000',
            'name' => 'CALABARZON',
            'label' => 'Region IV-A',
            // 'slug' => str_slug('CALABARZON'),
            'order' => 8
        ],
        [
            'id' => 17,
            // 'psgc_code' => '170000000',
            'name' => 'MIMAROPA',
            'label' => 'Region IV-B',
            // 'slug' => str_slug('MIMAROPA'),
            'order' => 9
        ],
        [
            'id' => 5,
            // 'psgc_code' => '050000000',
            'name' => 'Bicol Region',
            'label' => 'Region V',
            // 'slug' => str_slug('Bicol Region'),
            'order' => 10
        ],
        [
            'id' => 6,
            // 'psgc_code' => '060000000',
            'name' => 'Western Visayas',
            'label' => 'Region VI',
            // 'slug' => str_slug('Western Visayas'),
            'order' => 11
        ],
        [
            'id' => 7,
            // 'psgc_code' => '070000000',
            'name' => 'Central Visayas',
            'label' => 'Region VII',
            // 'slug' => str_slug('Central Visayas'),
            'order' => 12
        ],
        [
            'id' => 8,
            // 'psgc_code' => '080000000',
            'name' => 'Eastern Visayas',
            'label' => 'Region VIII',
            // 'slug' => str_slug('Eastern Visayas'),
            'order' => 13
        ],
        [
            'id' => 9,
            // 'psgc_code' => '090000000',
            'name' => 'Zamboanga Peninsula',
            'label' => 'Region IX',
            // 'slug' => str_slug('Zamboanga Peninsula'),
            'order' => 14
        ],
        [
            'id' => 10,
            // 'psgc_code' => '100000000',
            'name' => 'Northern Mindanao',
            'label' => 'Region X',
            // 'slug' => str_slug('Northern Mindanao'),
            'order' => 15
        ],
        [
            'id' => 11,
            // 'psgc_code' => '110000000',
            'name' => 'Davao Region',
            'label' => 'Region XI',
            // 'slug' => str_slug('Davao Region'),
            'order' => 16
        ],
        [
            'id' => 12,
            // 'psgc_code' => '120000000',
            'name' => 'SOCCSKSARGEN',
            'label' => 'Region XII',
            // 'slug' => str_slug('SOCCSKSARGEN'),
            'order' => 17
        ],
        [
            'id' => 16,
            // 'psgc_code' => '160000000',
            'name' => 'Caraga',
            'label' => 'Region XIII',
            // 'slug' => str_slug('Caraga'),
            'order' => 18
        ],
        [
            'id' => 15,
            // 'psgc_code' => '150000000',
            'name' => 'Autonomous Region of Muslim Mindanao',
            'label' => 'ARMM',
            // 'slug' => str_slug('Autonomous Region of Muslim Mindanao'),
            'order' => 19
        ],
        // [
        //   'id' => 998,
        //   'psgc_code' => '9980000000',
        //   'name' => 'Inter-regional',
        //   'label' => 'Inter-Regional',
        //   'slug' => str_slug('Inter-regional'),
        //   'order' => 2
        // ],
        // [
        //   'id' => 999,
        //   'psgc_code' => '9990000000',
        //   'name' => 'Nationwide',
        //   'label' => 'Nationwide',
        //   'slug' => str_slug('Nationwide'),
        //   'order' => 1
        // ],
    ]);
    }
}
