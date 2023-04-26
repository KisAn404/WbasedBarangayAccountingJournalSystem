<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $total_collection = Transaction::where('type', 'collection')->sum('amount');
        $total_deposit = Transaction::where('type', 'deposit')->sum('amount');
        $total_expense = Transaction::where('type', 'expense')->sum('amount');
        $total_withdraw = Transaction::where('type', 'withdraw')->sum('amount');
        return view('dashboard', compact('transactions', 'total_collection', 'total_deposit', 'total_expense', 'total_withdraw'));
    }
}    