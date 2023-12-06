<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDepartmentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $department = Department::where('role', 'Department')->get();
        $department = Department::all();
        $department = Department::paginate(10);
        return view('yearbook_pages.department_pages.department');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.department_pages.department', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        $data = $request->validate([
            'department_id' => [
                'required',
                'integer',
            ],

            'department_name' => 'required|string',
            'department_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            
        ]);

        // Process the user image if it's provided
        if ($request->hasFile('department_logo')) {
            $deptLogo = $request->file('department_logo')->store('/', 'public');
        } else {
            $deptLogo = 'assets/image/ceclogo.png';
        }
        // Create the user
        Department::create([
            'department_id' => $data['department_id'],
            'department_name' => $data['department_name'],
            'department_logo' => $deptLogo,
        ]);

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        
        $department = Department::all();
        $department = Department::paginate(10);
        return view('yearbook_pages.department_pages.department', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        
        // return view('yearbook_pages.department_pages.department', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        
        $data = $request->validate([
            'dept_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'dept_id' => 'required|string',
            'dept_name' => 'required|string',
        ]);
        
        $department = new Department(); // Create a new instance of the User model
        $department->fill([
            'dept_logo' => $data['dept_logo'],
            'dept_id' => $data['dept_id'],
            'dept_name' => $data['dept_name'],
        ]);
        $department->save();

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchDepartment()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $departments = DB::table('departments')->select('department_logo','department_id', 'department_name')->get();
        return response()->json($departments);

    }

    public function fetchDept1()
    {
        // Retrieve the last batch ID from the 'batches' table
        $lastDept = DB::table('departments')->select('id')->orderBy('id', 'desc')->first();

        // Increment the last batch ID by 1
        $lastDeptId = $lastDept ? ($lastDept->id + 1) : 1;

        return response()->json(['lastDeptId' => $lastDeptId]);
    }


}
