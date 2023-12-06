<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'Alumni')->get();
        return view('yearbook_pages.alumni_pages.alumni', compact('user'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.alumni_pages.alumni', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->validate([
            'user_id' => [
            'required',
            'integer',
            Rule::unique('users', 'user_id')->where(function ($query) {
                return $query->where('role', 'Alumni');
            }),
        ],
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4', 
            'phone_number' => 'required|string',
            'role' => 'required|string', 
        ]);

        // Process the user image if it's provided
        if ($request->hasFile('user_image')) {
            $alumniPhoto = $request->file('user_image')->store('assets/upload_image', 'public');
        } else {
            $alumniPhoto = 'assets/image/user_thumbnail.png';
        }

        $lastAlumni = User::where('role', 'Alumni')->orderBy('user_id', 'desc')->first();

        $alumniUserId = $lastAlumni ? $lastAlumni->user_id + 1 : 1;

        // Create the user
        User::create([
            'user_id' => $data['user_id'],
            'user_image' => $alumniPhoto,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'role' => $data['role'],

        ]);

        return redirect()->route('alumni.index')->with('success', 'Alumni created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        $user = User::all();
        $user = User::paginate(10);
        return view('yearbook_pages.alumni_pages.alumni', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        return view('yearbook_pages.alumni_pages.alumni', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
        $data = $request->validate([
            'user_id' => 'required|string',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
            'first_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4', 
            'role' => 'required|string', 

              
        ]);

         if ($request->hasFile('user_image')) {
            $alumniPhoto = $request->file('user_image')->store('assets/upload_image', 'public');
        } else {
            $alumniPhoto = 'assets/image/user_thumbnail.png';
        }

        $user = new User(); // Create a new instance of the User model
        $user->fill([
            'user_id' => $data['user_id'],
            'user_image' => $alumniPhoto,
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],

            
        ]);
        $user->save();

        return redirect()->route('alumni.index')->with('success', 'Alumni updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchAlumni()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $AlumniUsers = DB::table('users')->select('user_id', 'first_name','last_name', 'email', 'phone_number' )->where('role', 'Alumni')->get();

        // Mask the 'password' field for security
        foreach ($AlumniUsers as $user) {
            $user->password = '********';
        }

        // Return the masked staff users as JSON
        return response()->json($AlumniUsers);

    }




    public function getLastAlumniId()
    {
        $lastAlumni = DB::table('users')->where('role', 'Alumni')->orderBy('user_id', 'desc')->first();

        return response()->json(['last_alumni_id' => $lastAlumni ? $lastAlumni->user_id + 1 : 1]);
    }
    

}
