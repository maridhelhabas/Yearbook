<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOfficialRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class OfficialController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $official = Official::where('role', 'Official')->get();
        $official = Official::all();
        $official = Official::paginate(10);
        return view('yearbook_pages.official_pages.official');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.official_pages.official', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOfficialRequest $request)
    {
        $data = $request->validate([
            'official_id' => [
                'required',
                'integer',
            ],

            'official_fullname' => 'required|string',
            'official_role' => 'required|string',
            'official_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            
        ]);

        // Process the user image if it's provided
        if ($request->hasFile('official_image')) {
            $offImg = $request->file('official_image')->store('/', 'public');
        } else {
            $offImg = 'assets/image/ceclogo.png';
        }
        // Create the user
        Official::create([
            'official_id' => $data['official_id'],
            'official_fullname' => $data['official_fullname'],
            'official_role' => $data['official_role'],
            'official_image' => $offImg,
        ]);

        return redirect()->route('official.index')->with('success', 'Official created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Official $official)
    {
        
        $official = Official::all();
        $official = Official::paginate(10);
        return view('yearbook_pages.official_pages.official', compact('official'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Official $official)
    {
        
        // return view('yearbook_pages.official_pages.official', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Official $official)
    {
        
        $data = $request->validate([
            'off_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'off_id' => 'required|string',
            'off_name' => 'required|string',
            'off_role' => 'required|string',
        ]);
        
        $official = new Official(); // Create a new instance of the User model
        $official->fill([
            'off_img' => $data['off_img'],
            'off_id' => $data['off_id'],
            'off_name' => $data['off_name'],
            'off_role' => $data['off_role'],
        ]);
        $official->save();

        return redirect()->route('official.index')->with('success', 'Official updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchOfficial()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $officials = DB::table('officials')->select('official_image', 'official_id', 'official_fullname', 'official_role')->get();
        return response()->json($officials);

    }

    public function fetchOff1()
    {
        // Retrieve the last batch ID from the 'batches' table
        $lastOff = DB::table('officials')->select('id')->orderBy('id', 'desc')->first();

        // Increment the last batch ID by 1
        $lastOffId = $lastOff ? ($lastOff->id + 1) : 1;

        return response()->json(['lastOffId' => $lastOffId]);
    }


}
