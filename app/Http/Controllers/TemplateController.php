<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTemplateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $template = Template::where('role', 'Admin')->get();
        $template = Template::all();
        $template = Template::paginate(10);
        return view('yearbook_pages.template_pages.template');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.template_pages.template', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTemplateRequest $request)
    {
        $data = $request->validate([
            'temp_name' => 'required|string',
            'temp_status' => 'required|string',
            'temp_usage' => 'required|integer',
        ]);

        // Create the user
        Template::create([
            'template_name' => $data['temp_name'],
            'template_status' => $data['temp_status'],
            'template_usage' => $data['temp_usage'],
        ]);

        return redirect()->route('template.index')->with('success', 'Template created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        
        $template = Template::all();
        $template = Template::paginate(10);
        return view('yearbook_pages.template_pages.template', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        
        // return view('yearbook_pages.template_pages.template', compact('template'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        
        // $data = $request->validate([
        //     'temp_id' => 'required|string',
        //     'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
        //     'template_name' => 'required|string',
        //     'template_status' => 'required|string',
        //     'template_usage' => 'required|string',
        //     'role' => 'required|string', 
        // ]);

        //  if ($request->hasFile('user_image')) {
        //     $staffPhoto = $request->file('user_image')->store('assets/upload_image', 'public');
        // } else {
        //     $staffPhoto = 'assets/image/user_thumbnail.png';
        // }

        // $user = new User(); // Create a new instance of the User model
        // $user->fill([
        //     'temp_id' => $data['temp_id'],
        //     'user_image' => $staffPhoto,
        //     'temp_name' => $data['temp_name'],
        //     'temp_status' => $data['temp_status'],
        //     'temp_usage' => $data['temp_usage'],
        //     'role' => $data['role'],
        // ]);
        // $user->save();

        // return redirect()->route('template.index')->with('success', 'Template updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchTemplate()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $templates = DB::table('templates')->select('id', 'template_name', 'template_status', 'template_usage')->get();
        return response()->json($templates);

    }

    public function viewEditTemplates()
{
    // Query the database to fetch all templates
    $templates = DB::table('templates')
        ->select('id', 'template_name')
        ->get();

    return response()->json($templates);
}


    public function viewTemplate()
    {
        return view('yearbook_pages.template_pages.edit_template');
    }
}


