<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $user = User::where('role', 'Staff')->get();
        return view('yearbook_pages.staff_pages.staff', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.staff_pages.staff', compact('showModal'));
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
                return $query->where('role', 'Staff');
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
            $staffPhoto = $request->file('user_image')->store('assets/upload_image', 'public');
        } else {
            $staffPhoto = 'assets/image/user_thumbnail.png';
        }

        // Create the user
        User::create([
            'user_id' => $data['user_id'],
            'user_image' => $staffPhoto,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'role' => $data['role'],
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        $user = User::all();
        $user = User::paginate(10);
        return view('yearbook_pages.staff_pages.staff', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        return view('yearbook_pages.staff_pages.staff', compact('user'));

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
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4', 
            'phone_number' => 'required|string',
            'role' => 'required|string', 
        ]);

         if ($request->hasFile('user_image')) {
            $staffPhoto = $request->file('user_image')->store('assets/upload_image', 'public');
        } else {
            $staffPhoto = 'assets/image/user_thumbnail.png';
        }

        $user = new User(); // Create a new instance of the User model
        $user->fill([
            'user_id' => $data['user_id'],
            'user_image' => $staffPhoto,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'role' => $data['role'],
        ]);
        $user->save();

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchStaff()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $staffUsers = DB::table('users')->select('user_id', 'last_name', 'first_name', 'email', 'phone_number')->where('role', 'staff')->get();

        // Mask the 'password' field for security
        foreach ($staffUsers as $user) {
            $user->password = '********';
        }

        // Return the masked staff users as JSON
        return response()->json($staffUsers);

    }


    public function fetchStaff1()
    {
        // Retrieve the last batch ID from the 'batches' table
        $lastStaff = DB::table('users')->select('user_id')->orderBy('user_id', 'desc')->first();

        // Increment the last batch ID by 1
        $lastStaffId = $lastStaff ? ($lastStaff->user_id + 1) : 1;

        return response()->json(['lastStaffId' => $lastStaffId]);
    }


       public function UserImage($filename)
        {
            // Define the path to the user images in the public directory
            $path = public_path('/assets/upload_image/' . $filename);

            // Check if the file exists
            if (file_exists($path)) {
                return response()->file($path);
            }

            // Return a default image or an error response if the image is not found
            return response()->file(public_path('default_image.jpg'));
        }

    
}
