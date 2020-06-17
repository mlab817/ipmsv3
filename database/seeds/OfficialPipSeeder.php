<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class OfficialPipSeeder extends CsvSeeder
{		
		public function __construct()
		{
				$this->table = 'projects';
				$this->filename = base_path() . '/database/seeds/csvs/laravel-seeder.csv';
				$this->csv_delimiter = ',';
		}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

		DB::disableQueryLog();

		DB::table($this->table)->truncate();

        parent::run();

        Schema::enableForeignKeyConstraints();
    }
}
