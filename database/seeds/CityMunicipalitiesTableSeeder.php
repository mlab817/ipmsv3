<?php

use Illuminate\Database\Seeder;

class CityMunicipalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = \Illuminate\Support\Facades\File::get('database/data/city_municipalities.json');
        $data = json_decode($json);

        foreach ($data as $obj) {
            \App\Models\CityMunicipality::create([
               'id' => $obj->id,
               'name' => $obj->name,
               'city_municipality_name' => $obj->city_municipality_name,
               'population_2015' => str_replace(',','',$obj->population_2015),
               'area_km2' => str_replace(',','',$obj->area_km2),
               'population_density' => str_replace(',','',$obj->population_density_2015),
               'barangay' => str_replace(',','',$obj->barangay),
               'province_id' => $obj->province_id,
               'class' => $obj->class
            ]);
        }
    }
}
