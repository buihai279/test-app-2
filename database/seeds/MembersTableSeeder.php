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
        for ($i=1; $i <= 51; $i++) { 
        	
        	DB::table('members')->insert(
			    ['name' => 'user name '.$i, 'address' => 'street 1 , address '.rand(0,99),'age'=>rand(15,30),'photo'=>$i.'.png','created_at'=> new DateTime(),'updated_at'=> new DateTime()]
			);

        }
    }
}
