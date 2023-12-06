<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProgramRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $department = Department::where('role', 'Department')->get();
        $program = Program::all();
        $program = Program::paginate(10);
        return view('yearbook_pages.program_pages.program');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.program_pages.program', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProgramRequest $request)
    {
        $data = $request->validate([
            'program_id' => [
                'required',
                'integer',
            ],

            'program_name' => 'required|string',
            'department_name' => 'nullable|string',
            
        ]);

        // // Process the user image if it's provided
        // if ($request->hasFile('department_logo')) {
        //     $deptLogo = $request->file('department_logo')->store('/', 'public');
        // } else {
        //     $deptLogo = 'assets/image/ceclogo.png';
        // }
        // Create the user
        Program::create([
            'program_id' => $data['program_id'],
            'program_name' => $data['program_name'],
            'department_name' => $data['department_name'],
        ]);

        return redirect()->route('program.index')->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        
        $program = Program::all();
        $program = Program::paginate(10);
        return view('yearbook_pages.program_pages.program', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        
        // return view('yearbook_pages.department_pages.department', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        
        $data = $request->validate([
            'prog_id' => 'required|string',
            'prog_name' => 'required|string',
            'dept_name' => 'nullable|string',
        ]);
        
        $program = new Department(); // Create a new instance of the User model
        $program->fill([
            'prog_id' => $data['prog_id'],
            'prog_name' => $data['prog_name'],
            'dept_name' => $data['dept_name'],
        ]);
        $program->save();

        return redirect()->route('program.index')->with('success', 'Program updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchProgram()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $programs = DB::table('programs')->select('program_id', 'program_name', 'department_name')->get();
        return response()->json($programs);

    }

    public function fetchProg1()
    {
        // Retrieve the last batch ID from the 'batches' table
        $lastProg = DB::table('programs')->select('id')->orderBy('id', 'desc')->first();

        // Increment the last batch ID by 1
        $lastProgId = $lastProg ? ($lastProg->id + 1) : 1;

        return response()->json(['lastProgId' => $lastProgId]);
    }


}