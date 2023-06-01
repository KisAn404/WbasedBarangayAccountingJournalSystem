<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterRAAFController extends Controller
{
  public function index()
    {
        return view('FilterReports.raaf');
    }
}
