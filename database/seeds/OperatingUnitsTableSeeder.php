<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class OperatingUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $json = \Illuminate\Support\Facades\File::get('database/data/operating_units.json');
      $data = json_decode($json);

      foreach ($data as $obj) {
        \App\Models\OperatingUnit::updateOrCreate(
          [
            'id' => $obj->id
          ],
          [
          'operating_unit_type_id' => $obj->operating_unit_type_id,
          'name' => $obj->name,
          'acronym' => $obj->acronym,
          'agency_head_name' => $obj->agency_head_name,
          'agency_head_designation' => $obj->agency_head_designation,
          'image' => Str::slug($obj->acronym,'-') . '.svg',
          'telephone_number' => $obj->telephone_number,
          'fax_number' => $obj->fax_number,
          'email' => $obj->email
        ]);
      }

      $maxId = DB::table('operating_units')->max('id');
      DB::statement('ALTER TABLE operating_units AUTO_INCREMENT=' . intval($maxId + 1) . ';');

    }
}
