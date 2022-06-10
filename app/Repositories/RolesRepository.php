<?php

namespace App\Repositories;

use App\Interfaces\RolesRepositoryInterface;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RolesRepository implements RolesRepositoryInterface
{
    public function getAllRoles()
    {
        return Role::paginate(10);
    }
    public function getRolesById($roleId)
    {
        return Role::where('id', $roleId)->get();
    }
    public function deleteRoles($roleId)
    {
        return Role::destroy($roleId);
    }
    public function createRoles(array $roledetails)
    {
        $role = new Role();
        $role->name = $roledetails['name'];
        return $role->save();
    }
    public function updateRoles($roleId, array $roledetails)
    {
        return Role::where('id', $roleId)->update([
            'name' => $roledetails['name'],
        ]);
    }
}
