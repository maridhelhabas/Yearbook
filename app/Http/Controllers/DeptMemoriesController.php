<?php

namespace App\Http\Controllers;

use App\Models\DeptMemories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDeptMemoriesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DeptMemoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $department = Department::where('role', 'Department')->get();
        $deptMemories = DeptMemories::all();
        $deptMemories = DeptMemories::paginate(10);
        return view('yearbook_pages.department_pages.deptMemories');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.department_pages.deptMemories', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDeptMemoriesRequest $request)
    {
        $data = $request->validate([
            'image_id' => [
                'required',
                'integer',
            ],

            'dept_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            
        ]);

        // Process the user image if it's provided
        if ($request->hasFile('dept_image')) {
            $deptImage = $request->file('dept_image')->store('/', 'public');
        } else {
            $deptImage = 'assets/image/ceclogo.png';
        }
        // Create the user
        DeptMemories::create([
            'image_id' => $data['image_id'],
            'dept_image' => $deptImage,
        ]);

        return redirect()->route('deptMemories.index')->with('success', 'Department Memories created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeptMemories $deptMemories)
    {
        
        $deptMemories = DeptMemories::all();
        $deptMemories = DeptMemories::paginate(10);
        return view('yearbook_pages.department_pages.deptMemories', compact('deptMemories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeptMemories $deptMemories)
    {
        
        // return view('yearbook_pages.department_pages.department', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeptMemories $deptMemories)
    {
        
        $data = $request->validate([
            'dept_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'image_id' => 'required|string',
        ]);
        
        $deptMemories = new DeptMemories(); // Create a new instance of the User model
        $deptMemories->fill([
            'dept_img' => $data['dept_img'],
            'image_id' => $data['image_id'],
        ]);
        $deptMemories->save();

        return redirect()->route('deptMemories.index')->with('success', 'Department Memories updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchDeptMemories()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $dept_memories = DB::table('dept_memories')->select('dept_image','image_id')->get();
        return response()->json($dept_memories);

    }

    public function fetchDeptMemo1()
    {
        // Retrieve the last batch ID from the 'batches' table
        $lastDeptMemo = DB::table('dept_memories')->select('id')->orderBy('id', 'desc')->first();

        // Increment the last batch ID by 1
        $lastDeptMemoId = $lastDeptMemo ? ($lastDeptMemo->id + 1) : 1;

        return response()->json(['lastDeptMemoId' => $lastDeptMemoId]);
    }


}
