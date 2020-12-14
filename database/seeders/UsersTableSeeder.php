<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@site.loc',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
            'active' => 1
        ];

        DB::table('users')->insert($data);
    }
}
