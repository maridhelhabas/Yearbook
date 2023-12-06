<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationForm;

class registrationController extends Controller
{
    public function index()
    {
        $register = RegistrationForm::all();
        $register = RegistrationForm::paginate(10);
        return view('yearbook_pages.index', compact('register'));
    }

    public function dashboard()
    {
        
        return view('yearbook_pages.dashboard', compact('dashboard'));
    }

    public function reports()
    {
        $register = RegistrationForm::all();
        $register = RegistrationForm::paginate(10);
        return view('yearbook_pages.reports', compact('register'));
    }

    public function registration()
    {
        $register = RegistrationForm::all();
        $register = RegistrationForm::paginate(10);
        return view('yearbook_pages.registration', compact('register'));
    }

    public function design()
    {
        $register = RegistrationForm::all();
        $register = RegistrationForm::paginate(10);
        return view('yearbook_pages.design', compact('register'));
    }

    public function upload()
    {
        $register = RegistrationForm::all();
        $register = RegistrationForm::paginate(10);
        return view('yearbook_pages.upload', compact('register'));
    }


}
