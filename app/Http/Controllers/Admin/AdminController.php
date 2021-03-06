<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\RolesRepositoryInterface;
use App\Models\Admin;
use App\Models\Role_user;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class AdminController extends Controller
{



    private AdminRepositoryInterface $AdminRepositoryInterface;
    private RolesRepositoryInterface $RolesRepositoryInterface;

    public function __construct(AdminRepositoryInterface $AdminRepositoryInterface, RolesRepositoryInterface $RolesRepositoryInterface)
    {
        $this->AdminRepositoryInterface = $AdminRepositoryInterface;
        $this->RolesRepositoryInterface = $RolesRepositoryInterface;
    }
    public function view()
    {
        $users = $this->AdminRepositoryInterface->getAllAdmins();
        return view('admin.admin_users.view', compact('users'));
    }
    public function viewAdmin($id)
    {
        $details = $this->AdminRepositoryInterface->getAdminsById($id);
        return view('admin.admin_users.viewAdmin', compact('details'));
    }
    public function create()
    {
        $roles = $this->RolesRepositoryInterface->getAllRoles();
        return view('admin.admin_users.create', compact('roles'));
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required | max:25',
            'email' => 'required | email | unique:admins',
            'password' => 'string | min:8',
            'type' => 'required | digits_between:1,2'
        ]);

        $collection = $request->only('name', 'email', 'password', 'type');

        $saveadmin = $this->AdminRepositoryInterface->createAdmins($collection);
        if (isset($request->roles) && count($request->roles) > 0) {
            foreach ($request->roles as $roles) {
                $saverole = Role_user::insert(['admin_id' => $saveadmin, 'role_id' => $roles]);
            }
        }
        if ($saveadmin) {
            return redirect(route('admin.viewadmins'))->with('success', 'New Admin Profile Added!');
        } else {
            return redirect(route('admin.viewadmins'))->with('unsuccess', 'Some error occoured!');
        }
    }
    public function edit($id)
    {
        $details = $this->AdminRepositoryInterface->getAdminsById($id);

        $roles = $this->RolesRepositoryInterface->getAllRoles();
        // dd($id);
        $adroles = [];
        $roles_for_admin = Role_user::where('admin_id', $id)->get();
        // dd($roles_for_admin);

        foreach ($roles_for_admin as $rad) {
            array_push($adroles, $rad->role_id);
        }

        return view('admin.admin_users.edit', compact('details', 'roles', 'adroles'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required | max:25',
            'email' => 'required | email',
            'type' => 'required | digits_between:1,2'
        ]);

        $collection = $request->only('name', 'email', 'type');

        $editadmin = $this->AdminRepositoryInterface->updateAdmins($request->id, $collection);

        if (!isset($request->roles)) {
            Role_user::where('admin_id', $request->id)->delete();
        } else {
            Role_user::where('admin_id', $request->id)->delete();
            foreach ($request->roles as $r) {
                Role_user::insert(['admin_id' => $request->id, 'role_id' => $r]);
            }
        }

        if ($editadmin)
            return  redirect(route('admin.viewadmins'))->with('success', 'Profile Edited successfully!');
        else
            return  redirect(route('admin.viewadmins'))->with('unsuccess', 'Profile Edit error occoured');
    }
    public function delete($id)
    {
        $delete = $this->AdminRepositoryInterface->deleteAdmins($id);
        if ($delete)
            return back()->with('success', 'Profile deleted successfully!');
        else
            return back()->with('unsuccess', 'Profile deletion error occoured');
    }
}
