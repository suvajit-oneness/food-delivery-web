<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<= 10; $i++){
            $faker = \Faker\Factory::create();

            DB::table('merchants')->insert([
                "name" => $faker->name(),
                "email" => $faker->safeEmail,
                "phone" => $faker->numerify('##########'),
            ]);
        }
        
    }
}
