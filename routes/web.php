<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Middleware\checkAdminLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(checkAdminLogin::class)->group(function () {
    Route::get('/', function () {
        return redirect('admin/login');
    });
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'test'], function () {
    // die('Hi');
    Route::get('/get-customer', [TestController::class, 'getCustomer']);
    // Route::any('/get-customer', 'TestController@getCustomer')->name('test.get-customer');
});

// Route::get('/test/get-customer', 'TestController@getCustomer');