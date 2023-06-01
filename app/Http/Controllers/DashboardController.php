<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Check if the request method is POST
        if ($request->isMethod('post')) {
            // Validate the incoming request data
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);
    
            // Get the start and end dates from the request
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
    
            // Query the database for the collection and expense data within the date range
            $collections = Transaction::whereBetween('date', [$startDate, $endDate])->get();
            $expenses = Transaction::whereBetween('date', [$startDate, $endDate])->get();
    
            // Format the data for use in the chart
            $collectionData = $collections->groupBy('transactions')->map(function ($items) {
                return $items->sum('amount');
            });
            $expenseData = $expenses->groupBy('category')->map(function ($items) {
                return $items->sum('amount');
            });
    
            // Pass the data to the view
            return view('dashboard', [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'collectionData' => $collectionData,
                'expenseData' => $expenseData,
            ]);
        } else {
            // Otherwise, display the dashboard view without the chart
            $transactions = Transaction::all();
            $total_collection = Transaction::where('type', 'collection')->sum('amount');
            $total_deposit = Transaction::where('type', 'deposit')->sum('amount');
            $total_expense = Transaction::where('type', 'expense')->sum('amount');
            $total_withdraw = Transaction::where('type', 'withdraw')->sum('amount');
            return view('admin.dashboard', compact('transactions', 'total_collection', 'total_deposit', 'total_expense', 'total_withdraw'));
        }
    }
    
}