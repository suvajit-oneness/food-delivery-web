<?php

namespace App\Interfaces;

interface RolesRepositoryInterface
{
    public function getAllRoles();
    public function getRolesById($adminId);
    public function deleteRoles($adminId);
    public function createRoles(array $admindetails);
    public function updateRoles($adminId, array $admindetails);
}
