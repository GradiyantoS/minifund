<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert(['role_id' => '1','username' =>'admin','email'=>'admin@ad.com','password'=>bcrypt('admin')]);
        DB::table('admins')->insert(['role_id' => '2','username' =>'user','email'=>'user@ad.com','password'=>bcrypt('user')]);
    }
}
