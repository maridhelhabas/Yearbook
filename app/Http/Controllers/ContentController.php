<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Batch;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateContentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.template_pages.add_content', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContentRequest $request)
    {
        $data = $request->validate([
            'fullname' => 'required|string',
            'birthdate' => 'required|string',
            'address' => 'required|string',
            'parents_name' => 'required|string',
            'department_name' => 'required|string',
            'class_year' => 'required|string',
            'motto' => 'required|string',
        ]);

        // Create the user
        Content::create([
            'fullname' => $data['fullname'],
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'parents_name' => $data['parents_name'],
            'department_name' => $data['department_name'],
            'class_year' => $data['class_year'],
            'motto' => $data['motto'],
        ]);

        return redirect()->route('yearbookcontent.index')->with('success', 'Alumni Content created successfully.');

        // $data = $request->validate([
        //     'class_id' => [
        //     'required',
        //     'integer',
        //     Rule::unique('users', 'class_id')->where(function ($query) {
        //         return $query->where('role', 'Batch');
        //     }),
        // ],
        //     'class_year' => 'required|string', 
        // ]);

        // // // Process the user image if it's provided
        // // if ($request->hasFile('user_image')) {
        // //     $alumniPhoto = $request->file('user_image')->store('assets/upload_image', 'public');
        // // } else {
        // //     $alumniPhoto = 'assets/image/user_thumbnail.png';
        // // }

        // // Create the user
        // User::create([
        //     'class_id' => $data['class_id'],
        //     'class_year' => $data['class_year'],
        // ]);

        // return redirect()->route('batch.index')->with('success', 'Batch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        
        $content = Content::all();
        $content = Content::paginate(10);
        return view('yearbook_pages.template_pages.add_content', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        
        return view('yearbook_pages.template_pages.add_content', compact('content'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        
        $data = $request->validate([
            'fullname' => 'required|string',
            'birthdate' => 'required|string',
            'address' => 'required|string',
            'parents_name' => 'required|string',
            'department_name' => 'required|string',
            'class_year' => 'required|string',
            'motto' => 'required|string',
        ]);

        $content = new Content(); // Create a new instance of the User model
        $content->fill([
            'fullname' => $data['fullname'],
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'parents_name' => $data['parents_name'],
            'department_name' => $data['department_name'],
            'class_year' => $data['class_year'],
            'motto' => $data['motto'],
        ]);
        $content->save();

        return redirect()->route('yearbookcontent.index')->with('success', 'Alumni Data updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function fetchContent()
    // {

    //     // Query the database to fetch users with the staff role, excluding the 'password' field
    //     $contents = DB::table('contents')->select('fullname', 'birthdate', 'department_name', 'class_year', 'address', 'parents_name', 'motto')->get();
    //     return response()->json($contents);

    // }



    public function fetchDataContent(Request $request)
    {
        $selectedBatchId = $request->route('id');
        $selectedBatch = Batch::find($selectedBatchId);
    
        if ($selectedBatch) {
            return response()->json([
                'selectedBatchId' => $selectedBatch->id,
                'selectedBatchYear' => $selectedBatch->batch_year,
            ]);
        } else {
            return response()->json(['error' => 'Batch not found'], 404);
        }
    }
    
    public function fetchDataContent_department(Request $request)
    {
        $selectedDeptId = $request->route('department_id');
        $selectedDept = Department::find($selectedDeptId);
    
        if ($selectedDept) {
            return response()->json([
                'selectedDeptId' => $selectedDept->department_id,
                'selectedDeptName' => $selectedDept->department_name,
            ]);
        } else {
            return response()->json(['error' => 'Batch not found'], 404);
        }
    }
    
    

    
}
