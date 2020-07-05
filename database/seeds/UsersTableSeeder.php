<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
          [
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'active' => 1,
            'role_id' => 1
          ]
        ]);

        DB::table('users')->insert([
          [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2
          ]
        ]);

        DB::table('users')->insert([
          [
            'name' => 'ipd',
            'email' => 'ipd@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3
          ]
        ]);

        DB::table('users')->insert([
          [
            'name' => 'encoder',
            'email' => 'encoder@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 4
          ]
        ]);

        DB::table('users')->insert([
          [
            'name' => 'viewer',
            'email' => 'viewer@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 5
          ]
        ]);

        DB::table('users')->insert([
          [
            'name' => 'lead',
            'email' => 'lead@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 6
          ]
        ]);

        DB::table('users')->insert([
          [
            'name' => 'chief',
            'email' => 'chief@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 7
          ]
        ]);

        // seed users with projects
        // factory(App\User::class, 100)->create();

    }
}
