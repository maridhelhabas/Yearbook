<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\yearbook;

class yearbookController extends Controller
{

    // set staff page view
	// public function staff() {
	// 	return view('staff');
	// }

	// handle fetch all staff ajax request
	public function fetchAll() {
		$yearbook = yearbook::all();
		$output = '';
		if ($yearbook->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($yearbook as $yearbook) {
				$output .= '<tr>
                <td>' . $yearbook->id . '</td>
                <td><img src="storage/images/' . $yearbook->profile . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $yearbook->firstname . ' ' . $yearbook->lastname . '</td>
                <td>' . $yearbook->phone_number . '</td>
                <td>' . $yearbook->email_address . '</td>
                <td>' . $yearbook->password . '</td>
                <td>
                 <a href="#" id="' . $yearbook->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#edityearbookModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $yearbook->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new yearbook ajax request
	public function store(Request $request) {
		$file = $request->file('profile');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$yearbookData = ['profile' => $fileName,'firstname' => $request->fname, 'lastname' => $request->lname, 'phone_number' => $request->phone, 'email_address' => $request->email, 'password' => $request->password];
		yearbook::create($yearbookData);
		return response()->json([
			'status' => 200,
		]);
	}
    // handle edit an yearbook ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$yearbook = yearbook::find($id);
		return response()->json($yearbook);
	}

	// handle update an yearbook ajax request
	public function update(Request $request) {
		$fileName = '';
		$yearbook = yearbook::find($request->yearbook_id);
		if ($request->hasFile('profile')) {
			$file = $request->file('profile');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($yearbook->profile) {
				Storage::delete('public/images/' . $yearbook->profile);
			}
		} else {
			$fileName = $request->yearbook_profile;
		}

		$yearbookData = ['profile' => $fileName,'firstname' => $request->fname, 'lastname' => $request->lname, 'phone_number' => $request->phone, 'email_address' => $request->email, 'password' => $request->password];
		$yearbook->update($yearbookData);
		return response()->json([
			'status' => 200,
		]);
	}
    // handle delete an yearbook ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$yearbook = yearbook::find($id);
		if (Storage::delete('public/images/'. $yearbook->profile)) {
			yearbook::destroy($id);
		}
	}
}

