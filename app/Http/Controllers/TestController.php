<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Role_user;
use RoleUser;
use Illuminate\Database\Eloquent\Builder;

class TestController extends Controller
{
    //
    public function getCustomer(Request $request)
    {
        $restaurantDishes = \App\Models\Restaurant::find(1)->dishes();
        $dishData = $restaurantDishes->where(function(Builder $query){
            return $query->where('dishes.name', 'LIKE', '%G');
        })->get()->toarray();
        
        // dd($restaurantDishes);

        echo '<pre>'; print_r($dishData);

    }
}
