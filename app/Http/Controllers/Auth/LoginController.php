<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Add this line
use Illuminate\Support\Facades\Auth; // Add this line

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended(route('dashboard'));
    } else {
        $errors = [];

        $authEmailAttempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$authEmailAttempt && !isset($errors['email'])) {
            $errors['password'] = "The email or password is incorrect.Try Again";
        }

        session()->flash('login_errors', $errors);

        return redirect()->back()
            ->withInput($request->only('email', 'password')); 
    }
}

}