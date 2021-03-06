<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

            if (Auth::guard('admin')->user()->avatar) {
                // dd(Auth::guard('admin')->user()->avatar);
                $file_path = public_path() . '\admin\uploads\profile_image\\' . Auth::guard('admin')->user()->avatar;
                // dd($file_path);
                File::delete($file_path);
            }

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
            Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $request->name]);
            return back()->with('success', 'Profle Updated!');
        }
    }
    public function change_pasword()
    {
        return view('admin.admin_profile.password');
    }
    public function update_password(Request $request)
    {
        $old_password = Auth::guard('admin')->user()->password;

        if (Hash::check($request->old_pass, $old_password)) {
            $request->validate(
                [
                    'new_pass' => 'required | min:6',
                    'confirm_pass' => 'required | same:new_pass',
                ],
                [
                    'same' => 'Confirm password must match with new password!'
                ]
            );

            $changepass = Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => Hash::make($request->new_pass)]);
            if ($changepass) {
                Auth::guard('admin')->logout();
                return redirect('admin/login')->with('success', 'Password Changed successfully! Please login');
            } else
                return back()->with('unsuccess', 'Error occured!');
        } else {
            return back()->with('unsuccess', 'Old password do not matched!');
        }
    }
}
