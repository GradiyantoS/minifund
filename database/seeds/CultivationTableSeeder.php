<?php

use Illuminate\Database\Seeder;

class CultivationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cultivations')->insert(['description' => 'melon']);
        DB::table('cultivations')->insert(['description' => 'kentang']);
    }
}
