<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
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

            DB::table('customers')->insert([
                "name" => $faker->name(),
                "email" => $faker->safeEmail,
                // "phone" => $faker->phoneNumber,
                // "phone" => $faker->numerify(Str::random(10));
                "phone" => $faker->numerify('##########'),
                "gender" => $faker->randomElement(["male", "female", "others"]),
            ]);
        }
        

        
    }
}
