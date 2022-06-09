<?php

namespace App\Interfaces;

interface AdminRepositoryInterface
{
    public function getAllAdmins();
    public function getAdminsById($adminId);
    public function deleteAdmins($adminId);
    public function createAdmins(array $admindetails);
    public function updateAdmins($adminId, array $admindetails);
}
