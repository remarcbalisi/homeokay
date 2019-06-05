<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Kitchen',
            'slug' => 'kitchen',
        ]);

        DB::table('categories')->insert([
            'name' => 'Garden',
            'slug' => 'garden',
        ]);
    }
}
