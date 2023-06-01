<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterCBController extends Controller
{
    public function index()
    {
        return view('FilterReports.cb');
    }
}
