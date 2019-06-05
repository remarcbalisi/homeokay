<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Remarc',
            'middle_name' => 'Espinosa',
            'last_name' => 'Balisi',
            'email' => 'remarc.balisi@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Guest',
            'middle_name' => 'Guest',
            'last_name' => 'Guest',
            'email' => 'guest@gmail.com',
            'password' => Hash::make('guest'),
            'role_id' => 2,
        ]);
    }
}
