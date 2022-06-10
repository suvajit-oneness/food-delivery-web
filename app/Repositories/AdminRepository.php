<?php

namespace App\Repositories;

use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAllAdmins()
    {
        return Admin::where('id', '!=', Auth::guard('admin')->user()->id)->paginate(10);
    }
    public function getAdminsById($adminId)
    {
        return Admin::where('id', $adminId)->get();
    }
    public function deleteAdmins($adminId)
    {
        return Admin::destroy($adminId);
    }
    public function createAdmins(array $admindetails)
    {
        $admin = new Admin();
        $admin->name = $admindetails['name'];
        $admin->email = $admindetails['email'];
        $admin->password = Hash::make($admindetails['password']);
        $admin->type = $admindetails['type'];

        $admin->save();
        return $admin->id;
    }
    public function updateAdmins($adminId, array $admindetails)
    {
        return Admin::where('id', $adminId)->update([
            'name' => $admindetails['name'],
            'email' => $admindetails['email'],
            'type' => $admindetails['type'],
        ]);
    }
}
