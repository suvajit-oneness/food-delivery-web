<?php

namespace App\Repositories;

use App\Interfaces\RolesRepositoryInterface;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RolesRepository implements RolesRepositoryInterface
{
    public function getAllRoles()
    {
        return Roles::paginate(10);
    }
    public function getRolesById($roleId)
    {
        return Roles::where('id', $roleId)->get();
    }
    public function deleteRoles($roleId)
    {
        return Roles::destroy($roleId);
    }
    public function createRoles(array $roledetails)
    {
        $role = new Roles();
        $role->name = $roledetails['name'];
        return $role->save();
    }
    public function updateRoles($roleId, array $roledetails)
    {
        return Roles::where('id', $roleId)->update([
            'name' => $roledetails['name'],
        ]);
    }
}
