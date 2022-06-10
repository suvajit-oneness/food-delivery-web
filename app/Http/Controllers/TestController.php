<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class TestController extends Controller
{
    //
    public function getCustomer(Request $request)
    {
        $data = Customer::find(1);
        echo '<pre>'; print_r($data);
    }
}
