<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Bank; // Add this line to import the Bank model

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }
    
}
