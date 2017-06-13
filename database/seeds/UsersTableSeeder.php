<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert(
			    ['name' => 'user name 1', 'email' => 'admin@gmail.com','password'=>bcrypt('123456')]
			);
    	DB::table('users')->insert(
			    ['name' => 'user name 2', 'email' => 'member@gmail.com','password'=>bcrypt('123456')]
			);
    }
}