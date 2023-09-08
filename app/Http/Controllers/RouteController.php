<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function AdminLogin()
    {
        
        return view('yearbook_pages.index');

    }
    public function dashboardBlade()
    {
        return view('yearbook_pages.dashboard');

    }
    
    // public function staffBlade()
    // {
        
    //     return view('yearbook_pages.staff_pages.staff');

    // }
    
    public function alumniBlade()
    {
        return view('yearbook_pages.alumni');

    }
    public function reportBlade()
    {
        return view('yearbook_pages.reports');

    }
    public function userProfileBlade()
    {
        return view('yearbook_pages.profile');

    }
}
