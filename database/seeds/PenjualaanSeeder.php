<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PenjualaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Insert menggunakan seeder

    
    public function run()
    {
      for($i=1;$i<=100;$i++){
      DB::table('customer')->insert([
        'first_name' => 'coba',
        'last_name' => 'satu' ,
        'phone' => '02139123',
        'email' => 'coba@gmail.com' ,
        'street' => 'taman' ,
        'city' => 'sby' ,
        'state' => 'indonesia' ,
        'zip_code' => '61257'
      ]);
    }
  }
   

    //menggunakan faker
    /*
    public function run(){
      $faker= Faker::create('id_ID');

        for($i=1;$i<=10;$i++){
          
          DB::table('customer')->insert([
          'first_name' => $faker->name,
          'last_name' => $faker->name ,
          'phone' => $faker->phoneNumber,
          'email' => $faker->companyEmail ,
          'street' => $faker->streetAddress ,
          'city' => $faker->citySuffix ,
          'state' => 'indonesia',
          'zip_code' => '61257'
          ]);

        }
    }
    */
}
