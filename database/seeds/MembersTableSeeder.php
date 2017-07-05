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
        $arrLor=explode(' ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuries but also the leap into electronic typesetting remaining essentially unchanged It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum');
        for ($i=1; $i <= 20; $i++) {
            DB::table('members')->insert(
                ['name' => $arrLor[array_rand($arrLor)].' '.$arrLor[array_rand($arrLor)].' '.$arrLor[array_rand($arrLor)], 'address' => 'Ha Noi','age'=>rand(15, 30),'photo'=>$i.'.png','created_at'=> new DateTime(),'updated_at'=> new DateTime()]
            );
        }
    }
}
