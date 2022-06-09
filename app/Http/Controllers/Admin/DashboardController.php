<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class DashboardController extends Controller
{
    private AdminRepositoryInterface $AdminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $AdminRepositoryInterface)
    {
        $this->AdminRepositoryInterface = $AdminRepositoryInterface;
    }

    public function index()
    {
        return view('admin.home');
    }
}
