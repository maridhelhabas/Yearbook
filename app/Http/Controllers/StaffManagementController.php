<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class StaffManagementController extends Controller
{
    protected function createStaff(CreateUserRequest $request)
    {
        // Validate the incoming data
        $data = $request->validate([
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
            'user_image' => $staffPhoto,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            // 'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'role' => $data['role'],
        ]);

        return redirect()->route('staff')->with('success', 'Staff created successfully.');
    }

}
