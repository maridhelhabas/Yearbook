<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

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
            'user_id' => 'required|string',
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
            // 'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'role' => $data['role'],
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $user = User::all();
        $user = User::paginate(10);
        return view('yearbook_pages.staff_pages.staff', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
