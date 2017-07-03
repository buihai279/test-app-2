<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 20; $i++) {
            DB::table('members')->insert(
                ['name' => rand_string(8, 'abcdefghijklmnopqrstuvwxyz'), 'address' => 'street 1 , address '.substr(md5(rand()), 0, 5),'age'=>rand(15, 30),'photo'=>$i.'.png','created_at'=> new DateTime(),'updated_at'=> new DateTime()]
            );
        }
    }
}
