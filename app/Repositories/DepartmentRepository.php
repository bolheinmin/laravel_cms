<?php

namespace App\Repositories;

use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function getAllDepartments()
    {
        return Department::all();
    }
    public function getDepartmentById($departmentId)
    {
        return Department::findOrFail($departmentId);
    }
    public function deleteDepartment($departmentId)
    {
        Department::destroy($departmentId);
    }
    public function createDepartment(array $department)
    {
        return Department::create($department);
    }
    public function updateDepartment($departmentId, array $newDepartment)
    {
        return Department::whereId($departmentId)->update($newDepartment);
    }
}