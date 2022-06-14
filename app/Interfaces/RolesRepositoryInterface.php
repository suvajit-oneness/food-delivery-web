<?php

namespace App\Interfaces;

interface RolesRepositoryInterface
{
    public function getAllRoles();
    public function getRolesById($roleId);
    public function deleteRoles($roleId);
    public function createRoles(array $roledetails);
    public function updateRoles($roleId, array $roledetails);
}
