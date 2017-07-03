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
                ['name' => 'Bui Van Hai', 'email' => 'admin@gmail.com','password'=>bcrypt('123456')]
            );
        DB::table('users')->insert(
                ['name' => 'Nguyen Van A', 'email' => 'member@gmail.com','password'=>bcrypt('123456')]
            );
    }
}
