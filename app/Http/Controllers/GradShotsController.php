<?php

namespace App\Http\Controllers;

use App\Models\GradShots;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGradShotsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GradShotsController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $department = Department::where('role', 'Department')->get();
        $gradshots = GradShots::all();
        $gradshots = GradShots::paginate(10);
        return view('yearbook_pages.alumni_pages.gradshots');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.alumni_pages.gradshots', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGradShotsRequest $request)
    {
        $data = $request->validate([
            'gradshot_id' => [
                'required',
                'integer',
            ],

            'grad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            
        ]);

        // Process the user image if it's provided
        if ($request->hasFile('grad_image')) {
            $gradImage = $request->file('grad_image')->store('/', 'public');
        } else {
            $gradImage = 'assets/image/ceclogo.png';
        }
        // Create the user
        GradShots::create([
            'gradshot_id' => $data['gradshot_id'],
            'grad_image' => $gradImage,
        ]);

        return redirect()->route('gradshots.index')->with('success', 'Graduation Shots created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GradShots $gradshots)
    {
        
        $gradshots = GradShots::all();
        $gradshots = GradShots::paginate(10);
        return view('yearbook_pages.alumni_pages.gradshots', compact('gradshots'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GradShots $gradshots)
    {
        
        // return view('yearbook_pages.department_pages.department', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GradShots $gradshots)
    {
        
        $data = $request->validate([
            'grad_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'gradshot_id' => 'required|string',
        ]);
        
        $gradshots = new GradShots(); // Create a new instance of the User model
        $gradshots->fill([
            'grad_img' => $data['grad_img'],
            'gradshot_id' => $data['gradshot_id'],
        ]);
        $gradshots->save();

        return redirect()->route('gradshots.index')->with('success', 'Graduation Shots updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchGradShots()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $grad_shots = DB::table('grad_shots')->select('grad_image','gradshot_id')->get();
        return response()->json($grad_shots);

    }

    public function fetchGradShot1()
    {
        // Retrieve the last batch ID from the 'batches' table
        $lastGradShot = DB::table('grad_shots')->select('id')->orderBy('id', 'desc')->first();

        // Increment the last batch ID by 1
        $lastGradShotId = $lastGradShot ? ($lastGradShot->id + 1) : 1;

        return response()->json(['lastGradShotId' => $lastGradShotId]);
    }


}