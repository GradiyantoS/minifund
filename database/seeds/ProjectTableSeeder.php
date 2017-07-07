<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('projects')->insert(['id'=>'1','cultivation_id' => '1','project_no' => '1','title'=>'Melon 1','start_at'=>'2017-01-01','end_at'=>'2017-06-01','image_url'=>'upload/DSC_0008.JPG']);
        DB::table('projects')->insert(['id'=>'2','cultivation_id' => '1','project_no' => '2','title'=>'Melon 2','start_at'=>'2017-02-01','end_at'=>'2017-06-01','image_url'=>' upload/DSC_0033.JPG']);
        DB::table('projects')->insert(['id'=>'3','cultivation_id' => '2','project_no' => '3','title'=>'Kentang 1','start_at'=>'2017-03-01','end_at'=>'2017-06-01','image_url'=>'upload/DSC_0006.JPG']);
        DB::table('projects')->insert(['id'=>'4','cultivation_id' => '2','project_no' => '4','title'=>'Kentang 2','start_at'=>'2017-04-01','end_at'=>'2017-06-01','image_url'=>'upload/DSC_0040.JPG']);
    }
}
