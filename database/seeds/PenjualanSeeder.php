<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 50; $x++){
 
        	// insert data dummy categories dengan faker
        	//DB::table('categories')->insert([
        	//	'category_id' => $x ,
        	//	'category_name' => $faker->name,
            //]);

            DB::table('customer')->insert([
                'first_name' => $faker->name,
                'last_name' => $faker->name,
                'phone' => $faker->numberBetween(5000,10000),
                'email' => $faker->companyEmail,
                'street' => $faker->streetName,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip_code' => $faker->numberBetween(61250,61259)
            ]);
        }

    }
}
