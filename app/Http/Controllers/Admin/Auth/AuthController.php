<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | exists:admins',
            'password' => 'required'
        ]);

        $cred = $request->only('email', 'password');

        // dd($cred);

        if (Auth::guard('admin')->attempt($cred)) {
            return redirect(route('admin.dashboard'));
        } else
            return redirect()->back()->with('WrongCred', 'Wrong Credentials!');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
