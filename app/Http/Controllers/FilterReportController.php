<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterReportController extends Controller
{
     public function index()
    {
        return view('FilterReports.filter');
    }
}
