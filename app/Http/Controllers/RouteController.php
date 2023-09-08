<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function staffBlade()
    {
        
        return view('yearbook_pages.staff');

    }
    
    public function login()
    {
        return redirect()->route('yearbook_pages.index');

    }
}
