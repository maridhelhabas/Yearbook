<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffRegistrationController extends Controller
{
    // Validation rules for staff registration
    protected function Validator(array $data)
    {
        return Validator::make($data, [
            'user_image' => ['required', 'image'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staff'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required', 'string', 'max:255'],
        ]);
    }




    // // Handle staff registration
    // public function register(Request $request)
    // {
    //     // Validate the incoming data
    //     $validatedData = $this->staffValidator($request->all());

    //     // Check if validation passes
    //     if ($validatedData->passes()) {
    //         // Call registerStaff with the validated data
    //         $data = $request->all();
    //         $staff = $this->registerStaff($data);
            
    //         // Redirect or return a response after successful registration
    //         // For example, you can redirect to a success page
    //         return redirect()->route('success')->with('success', 'Staff registered successfully');
    //     } else {
    //         // Handle validation failure, e.g., redirect back with errors
    //         return redirect()->back()->withErrors($validatedData)->withInput();
    //     }
    // }

        // Create a new staff member instance after a valid registration.
    protected function create(array $data)
    {
        if (isset($data['user_image'])) {
            $staffPhoto = $data['user_image']->store('assets/upload_image', 'public');
        } else {
            $staffPhoto = null;
        }

    return User::create([
        'user_image' => $staffPhoto,
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'phone_number' => $data['phone_number'],
        'role' => $data['roles'],
    ]);
}


}
