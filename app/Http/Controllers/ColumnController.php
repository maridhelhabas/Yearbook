<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
class ColumnController extends Controller
{
    public function index()
    {
        return view('addColumn');
    }

    public function addColumn(Request $request)
    {
        $columnName = $request->input('column_name');
        $columnType = $request->input('column_type');


        $dataTypes = [
            'string' => 'string',
            'integer' => 'integer',
            'bigInteger' => 'bigInteger',
            'date' => 'date',
             // Map "date" to "date"
            // Add more data types as needed
        ];

        if (!array_key_exists($columnType, $dataTypes)) {
            return redirect()->back()->withErrors(['column_type' => 'Invalid data type.']);
        }

         $tableName = 'users'; 
            Schema::table($tableName, function (Blueprint $table) use ($columnName, $columnType, $dataTypes) {
                $columnDefinition = $table->{$dataTypes[$columnType]}($columnName);
                
                if ($columnType === 'date') {
                    $columnDefinition->default('2000-11-9');
                }
            });

        return redirect()->route('alumni.add.form-attribute')->with('success', 'Column added successfully.');
    }

    public function columnDisplay()
    {
        $tableName = 'users'; 
        $columnNames = Schema::getColumnListing($tableName);
        
        //$selectedColumnNames = ['user_id', 'user_image', 'firstname', 'last_name'];
        
       // $columnNames = array_intersect($allColumnNames);
            // if (!empty($selectedColumnNames)) {
            //     $columnNames = array_intersect($allolumnNames, $selectedColumnNames);
            // }

        return view('yearbook_pages.alumni_pages.alumni', compact('columnNames'));
    }


}
