<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function loginform()
    {
        return view('login');
    }
    
    public function login()
    {
        return redirect()->route('yearbook_pages.index');

    }
}
