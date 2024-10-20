<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT; // Import the RT model

class DataRTController extends Controller
{
    public function index()
    {
        // Fetch all RT records from the database
        $dataRT = RT::all();
        
        // Pass the data to the view
        return view('admin.data_rt', compact('dataRT'));
    }
}
