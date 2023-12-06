<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Batch;
use App\Models\Department;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function AdminLogin()
    {
        
        return view('yearbook_pages.index');

    }
    public function AlumniLogin()
    {
        
        return view('yearbook_pages.alumni_pages.alumni_index');

    }
    public function dashboardBlade()
    {
        return view('yearbook_pages.dashboard');

    }


    
    public function templateBlade()
    {
        
        return view('yearbook_pages.template_pages.template');

    }

    public function viewTemplate()
    {
        
        return view('yearbook_pages.template_pages.edit_template');

    }
    
    public function alumniBlade()
    {
        return view('yearbook_pages.alumni_pages.alumni');

    }
     public function alumniHomeBlade()
    {
        return view('yearbook_pages.alumni_pages.alumni_home');

    }
      public function yearbookBlade()
    {
        return view('yearbook_pages.yearbook_content.yearbook');

    }
       public function staffHomeBlade()
    {
        return view('yearbook_pages.staff_pages.staff_home');

    }
    public function passwordBlade()
    {
        return view('yearbook_pages.change_pass');

    }
    public function profileBlade()
    {
        return view('yearbook_pages.profile');

    }
// public function contentBlade(Request $request)
// {
//     $query = $request->input('query');

    
//         $users = Content::where('fullname', 'like', '%' . $query . '%')
//                     ->select('fullname', 'birthdate', 'address', 'parents_name', 'department_name', 'class_year', 'motto')
//                     ->get();

     

//     // Pass the $users data to the Blade view
//     return view('yearbook_pages.yearbook_page.contents', compact('users'));
// }

public function contentBlade(Request $request)
{
    // Check if it's a POST request (search request)
    if ($request->isMethod('post')) {
        $query = $request->input('query');

        // Perform the search logic based on $query
        $content = Content::where('id', 'like', '%' . $query . '%')
                 ->orWhere('fullname', 'like', '%' . $query . '%')
                 ->select('id', 'fullname', 'birthdate', 'address', 'parents_name', 'department_name', 'class_year', 'motto')
                 ->get();
        // Return the search results as JSON
        return response()->json($content);
    }

    // If it's a GET request, display the content
    $content = Content::all();
    $batch = Batch::all();
    $batch = Batch::paginate(10);
    $department = Department::all();

    return view('yearbook_pages.yearbook_page.contents', compact('content', 'batch','department'));

}





//     public function search(Request $request)
// {
//     $query = $request->input('query');

//     // Perform the database search using the 'fullname' column
//     $users = Content::where('fullname', 'like', '%' . $query . '%')
//                  ->select('fullname','birthdate', 'address', 'parents_name','department_name','class_year','motto')
//                  ->get();

//     return response()->json($users);
// }
        public function addContent()
    {
        return view('yearbook_pages.template_pages.add_content');

    }
    public function reportBlade()
    {
        return view('yearbook_pages.reports');

    }
       public function recordsBlade()
    {
        return view('yearbook_pages.records');

    }
       public function chatBlade()
    {
        return view('yearbook_pages.chat');

    }
    public function userProfileBlade()
    {
        return view('yearbook_pages.profile');

    }
    public function batchBlade()
    {
        return view('yearbook_pages.batch_pages.batch');

    }
    public function departmentBlade()
    {
        return view('yearbook_pages.department_pages.department');

    }
    public function programBlade()
    {
        return view('yearbook_pages.program_pages.program');

    }
    public function messagesBlade()
    {
        return view('yearbook_pages.message_pages.message');

    }
    public function officialsBlade()
    {
        return view('yearbook_pages.official_pages.official');

    }
    public function memoriesBlade()
    {
        return view('yearbook_pages.department_pages.deptMemories');

    }
     public function gradshotsBlade()
    {
        return view('yearbook_pages.alumni_pages.gradshots');

    }
     public function staffprofileBlade()
    {
        return view('yearbook_pages.staff_pages.staffprofile');

    }
     public function staffchangepassBlade()
    {
        return view('yearbook_pages.staff_pages.staffchangepass');

    }
    public function alumniprofileBlade()
    {
        return view('yearbook_pages.alumni_pages.alumniprofile');

    }
      public function alumnichangepassBlade()
    {
        return view('yearbook_pages.alumni_pages.alumnichangepass');

    }
     public function adminprofileBlade()
    {
        return view('yearbook_pages.adminprofile');

    }

}
