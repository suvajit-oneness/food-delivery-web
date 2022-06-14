<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<= 20; $i++){
            $faker = \Faker\Factory::create();
            $name = $faker->Restaurant.name();

            DB::table('restaurants')->insert([
                "name" => $name,
                'description' => $name,
                'merchant_id' => rand(1, 10)
            ]);
        }
    }
}
