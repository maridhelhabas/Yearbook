<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBatchRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $batch = Batch::where('role', 'Admin')->get();
        // return view('yearbook_pages.batch_pages.batch', compact('batch'));
        $batch = Batch::all();
        return view('yearbook_pages.batch_pages.batch', compact('batch'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $showModal = true; // Set this to true to display the modal
            return view('yearbook_pages.batch_pages.batch', compact('showModal'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CreateBatchRequest $request)
    {
        $validatedData = $request->validated();

        // Check if the batch_year already exists
        $existingBatch = Batch::where('batch_year', $validatedData['batch_year'])->first();

        if ($existingBatch) {
            return redirect()->route('batch.index')->with('error', 'A batch with the same year already exists.');
        }

        // If it doesn't exist, create the batch
        Batch::create([
            'batch_year' => $validatedData['batch_year'],
        ]);

        return redirect()->route('batch.index')->with('success', 'Batch created successfully.');
    }




    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
      $batch = Batch::pluck('batch_year', 'batch_year');
    return view('yearbook_pages.batch_pages.batch', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        
        return view('yearbook_pages.batch_pages.batch', compact('batch'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Batch $batch)
    {
        $data = $request->validate([
            'batch_year' => [
                'required',
                'string',
                Rule::unique('batches', 'batch_year')->ignore($batch->id),
            ],
        ], [
            'batch_year.unique' => 'The batch year is already taken.',
        ]);

        $batch->update([
            'batch_year' => $data['batch_year'],
        ]);

        return redirect()->route('batch.index')->with('success', 'Batch updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchBatch()
    {

        // Query the database to fetch users with the staff role, excluding the 'password' field
        $batches = DB::table('batches')->select('id','batch_year')->get();
        return response()->json($batches);

    }

public function fetchBatch1()
{
    // Retrieve the last batch ID from the 'batches' table
    $lastBatch = DB::table('batches')->select('id')->orderBy('id', 'desc')->first();

    // Increment the last batch ID by 1
    $lastBatchId = $lastBatch ? ($lastBatch->id + 1) : 1;

    return response()->json(['lastBatchId' => $lastBatchId]);
}


}

