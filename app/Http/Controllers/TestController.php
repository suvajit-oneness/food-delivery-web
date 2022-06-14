<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Role_user;
use RoleUser;

class TestController extends Controller
{
    //
    public function getCustomer(Request $request)
    {
        dd(Role_user::get());
    }
}
