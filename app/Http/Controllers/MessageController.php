<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MessageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $message = Message::where('role', 'Message')->get();
        $message = Message::all();
        $message = Message::paginate(10);
        return view('yearbook_pages.message_pages.message');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.message_pages.message', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMessageRequest $request)
    {
        $data = $request->validate([
            'message_id' => [
                'required',
                'integer',
            ],

            'message_content' => 'required|string',
            'message_writer' => 'required|string',
            'message_role' => 'required|string',
            'writer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            
        ]);

        // Process the user image if it's provided
        if ($request->hasFile('writer_image')) {
            $writerImg = $request->file('writer_image')->store('/', 'public');
        } else {
            $writerImg = 'assets/image/user.png';
        }
        // Create the user
        Message::create([
            'message_id' => $data['message_id'],
            'message_content' => $data['message_content'],
            'message_writer' => $data['message_writer'],
            'message_role' => $data['message_role'],
            'writer_image' => $writerImg,
        ]);

        return redirect()->route('message.index')->with('success', 'Message created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        
        $message = Message::all();
        $message = Message::paginate(10);
        return view('yearbook_pages.message_pages.message', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        
        // return view('yearbook_pages.department_pages.department', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        
        $data = $request->validate([
            'writer_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'mess_id' => 'required|string',
            'mess_content' => 'required|string',
            'mess_writer' => 'required|string',
            'mess_role' => 'required|string',
        ]);
        
        $message = new Message(); // Create a new instance of the User model
        $message->fill([
            'writer_img' => $data['writer_img'],
            'mess_id' => $data['mess_id'],
            'mess_content' => $data['mess_content'],
            'mess_writer' => $data['mess_writer'],
            'mess_role' => $data['mess_role'],
        ]);
        $message->save();

        return redirect()->route('message.index')->with('success', 'Message updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchMessage()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $messages = DB::table('messages')->select('writer_image','message_id', 'message_content', 'message_writer', 'message_role')->get();
        return response()->json($messages);

    }

    public function fetchMess1()
    {
        // Retrieve the last batch ID from the 'batches' table
        $lastMess = DB::table('messages')->select('id')->orderBy('id', 'desc')->first();

        // Increment the last batch ID by 1
        $lastMessId = $lastMess ? ($lastMess->id + 1) : 1;

        return response()->json(['lastMessId' => $lastMessId]);
    }


}