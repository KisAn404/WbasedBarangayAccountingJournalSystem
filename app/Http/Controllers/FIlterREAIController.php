<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FIlterREAIController extends Controller
{
   public function index()
    {
        return view('FilterReports.reai');
    }
}
