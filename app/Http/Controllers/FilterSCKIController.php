<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterSCKIController extends Controller
{
    public function index()
    {
        return view('FilterReports.scki');
    }
}
