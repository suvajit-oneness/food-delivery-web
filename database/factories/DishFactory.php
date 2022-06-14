<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dish;

class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Dish::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();

        /*
        Indian restaurant items using "jzonta/faker-restaurant" package ...
        For more info please go through https://github.com/jzonta/FakerRestaurant 
        */

        $faker->addProvider(new \FakerRestaurant\Provider\id_ID\Restaurant($faker));

        $foodName = $faker->foodName(); 
        
        
        return [
            'added_by' => 'admin',
            'name' => $foodName,
            'description' => $foodName,
            'restaurant_id' => 1
        ];
    

        
    }
}
