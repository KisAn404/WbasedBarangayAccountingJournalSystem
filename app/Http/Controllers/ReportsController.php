<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
{
    // return the view for your reports page
    return view('reports.index');
}

}
