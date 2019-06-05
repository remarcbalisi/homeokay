<?php

use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'name' => 'Pans',
            'slug' => 'pans',
            'category_id' => 1,
        ]);

        DB::table('sub_categories')->insert([
            'name' => 'Spoons',
            'slug' => 'spoons',
            'category_id' => 1,
        ]);

        DB::table('sub_categories')->insert([
            'name' => 'Shovel',
            'slug' => 'shovel',
            'category_id' => 2,
        ]);

        DB::table('sub_categories')->insert([
            'name' => 'Gloves',
            'slug' => 'gloves',
            'category_id' => 2,
        ]);
    }
}
