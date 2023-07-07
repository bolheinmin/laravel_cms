<?php

namespace App\Http\Controllers;

use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private DepartmentRepositoryInterface $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index(Request $request)
    {
        $departments = $this->departmentRepository->getAllDepartments();

        if ($request->keyword != '') {
            $departments = $departments->where('name', 'LIKE', '%' . $request->keyword . '%');
        }

        $count = $departments->count();
        // $departments = $departments->paginate(10);
        return view('department.index', compact('count', 'departments'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('department.create');
    }
    public function edit(Request $request)
    {
        $departmentId = $request->route('departmentId');

        $department = $this->departmentRepository->getDepartmentById($departmentId);

        if(empty($department)) {
            return back();
        }

        return view('department.edit', ['department' => $department]);
    }
    public function store(Request $request)
    {
        $department = [
            'name'=>$request->name
        ];

        // dd($department);

        $this->departmentRepository->createDepartment($department);

        return redirect()->Route('department')->with('success', 'Successfully Created!');
    }
    public function show(Request $request)
    {
        $departmentId = $request->route('departmentId');

        $department = $this->departmentRepository->getDepartmentById($departmentId);

        if(empty($department)) {
            return back();
;        }

        return view('department.show', ['department' => $department]);
    }

    public function update(Request $request)
    {
        $departmentId = $request->route('departmentId');

        $department = [
            'name' => $request->name  
        ];

        $this->departmentRepository->deleteDepartment($departmentId, $department);
        return redirect()->route('department');
    }

    public function destory(Request $request)
    {
        $departmentId= $request->route('departmentId');
        // dd($departmentId);

        $this->departmentRepository->deleteDepartment($departmentId);
        return redirect()->back()->with('success', 'Deleted successfully.');
    }

}
