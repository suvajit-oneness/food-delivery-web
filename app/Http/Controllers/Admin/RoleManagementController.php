<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\RolesRepositoryInterface;
use Illuminate\Http\Request;

class RoleManagementController extends Controller
{
    private RolesRepositoryInterface $RolesRepositoryInterface;

    public function __construct(RolesRepositoryInterface $RolesRepositoryInterface)
    {
        $this->RolesRepositoryInterface = $RolesRepositoryInterface;
    }
    public function view()
    {
        $datas = $this->RolesRepositoryInterface->getAllRoles();
        return view('admin.roles.view', compact('datas'));
    }
    public function create()
    {
        return view('admin.roles.create');
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required | max:25',
        ]);

        $collection = $request->only('name');

        $saveadmin = $this->RolesRepositoryInterface->createRoles($collection);

        if ($saveadmin) {
            return redirect(route('roles.viewroles'))->with('success', 'New Role Added!');
        } else {
            return redirect(route('roles.viewroles'))->with('unsuccess', 'Some error occoured!');
        }
    }
    public function edit($id)
    {
        $details = $this->RolesRepositoryInterface->getRolesById($id);
        return view('admin.roles.edit', compact('details'));
    }
    public function update()
    {
    }
    public function delete($id)
    {
        $deleted = $this->RolesRepositoryInterface->deleteRoles($id);
        if ($deleted)
            return back()->with('success', 'Role deleted successfully!');
        else
            return back()->with('unsuccess', 'Role deletion error occoured');
    }
}
