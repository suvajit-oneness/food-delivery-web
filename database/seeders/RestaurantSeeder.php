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
        $arrNames = [
            "Cool Beans Barista",
            "Here & There Cafe",
            "Espresso Lane Coffee Bar",
            "Needle & Thread Cafe",
            "Rainforest Planet Diner",
            "Secret Planet Cafe",
            "Fatty Panini Luncheonette",
            "Black Delight Diner",
            "Sweet Planet Coffee Shop",
            "Havana Java Cafe"
        ];
        for($i = 0; $i< count($arrNames); $i++){
            // $faker = \Faker\Factory::create();
            $name = $arrNames[$i];
            DB::table('restaurants')->insert([
                "name" => $name,
                'description' => $name,
                'merchant_id' => rand(1, 10)
            ]);
        }
    }
}
