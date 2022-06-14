<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleManagementController;
use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\checkAdminLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/test', function () {
//     return "Hello";
// });
Route::middleware([checkAdminLogin::class])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.doLogin');
});

Route::middleware([checkAdmin::class])->group(
    function () {

        Route::post('admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

        Route::get('dashboard', [DashboardController::class, 'index'], function () {
            dd('hello');
        })->name('admin.dashboard');

        Route::prefix('dashboard/profile')->name('profile.')->group(function () {
            Route::get('view', [ProfileController::class, 'view'])->name('view_profile');
            Route::post('update', [ProfileController::class, 'update'])->name('update_profile');
            Route::get('change-password', [ProfileController::class, 'change_pasword'])->name('change-password');
            Route::post('change-password', [ProfileController::class, 'update_password'])->name('update-password');
        });

        // Admin Management
        Route::prefix('dashboard/admin')->name('admin.')->group(function () {
            Route::get('view', [AdminController::class, 'view'])->name('viewadmins');
            Route::get('view/{id}', [AdminController::class, 'viewAdmin'])->name('viewadmindetails');
            Route::get('create', [AdminController::class, 'create'])->name('createadmin');
            Route::post('create', [AdminController::class, 'add'])->name('addadmin');
            Route::get('edit/{id}', [AdminController::class, 'edit'])->name('editadmin');
            Route::post('edit', [AdminController::class, 'update'])->name('updateadmin');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name(('delete'));
        });

        Route::prefix('dashboard/roles')->name('roles.')->group(function () {
            Route::get('view', [RoleManagementController::class, 'view'])->name('viewroles');
            Route::get('create', [RoleManagementController::class, 'create'])->name('createroles');
            Route::post('create', [RoleManagementController::class, 'add'])->name('addroles');
            Route::get('edit/{id}', [RoleManagementController::class, 'edit'])->name('editroles');
            Route::post('edit', [RoleManagementController::class, 'update'])->name('updateroles');
            Route::get('delete/{id}', [RoleManagementController::class, 'delete'])->name(('delete'));
        });
    }
);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
