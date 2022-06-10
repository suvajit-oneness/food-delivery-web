<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private AdminRepositoryInterface $AdminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $AdminRepositoryInterface)
    {
        $this->AdminRepositoryInterface = $AdminRepositoryInterface;
    }
    public function view()
    {
        $data = $this->AdminRepositoryInterface->getAdminsById(Auth::guard('admin')->user()->id);
        return view('admin.admin_profile.profile', compact('data'));
    }
    public function update(Request $request)
    {
        if (isset($request->avatar)) {
            $profile = uniqid() . '-' . $request->file('avatar')->getClientOriginalName();
            if ($request->file('avatar')->move(public_path('admin/uploads/profile_image'), $profile)) {
                Admin::where('email', Auth::guard('admin')->user()->email)->update([
                    'name' => $request->name, 
                    'avatar' => $profile
                ]);
                return back()->with('success', 'Profle Updated!');
            } else {
                return back()->with('unsuccess', 'Profle updation error!');
            }
        } else {
            Admin::where('email', Auth::guard('admin')->user()->email)->update('name', $request->name);
            return back()->with('success', 'Profle Updated!');
        }
    }
    public function change_pasword()
    {
        return view('admin.admin_profile.password');
    }
    public function update_pasword()
    {
    }
}
