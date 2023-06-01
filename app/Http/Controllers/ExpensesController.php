<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ExpensesController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('type', 'expense')
            ->latest('created_at')
            ->paginate(10);
    
        $accounts = Account::all();
        $total = Transaction::where('type', 'expense')->sum('amount');
        $latest = Transaction::latest()->first();
    
        return view('admin.expense.index', compact('transactions', 'accounts', 'total', 'latest'));
    }
   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'date' => 'required',
        'payer_payee' => 'required',
        'particulars' => 'required',
        'bank_account' => 'required',
        'type_of_fund' => 'required',
        'dv_no' => 'required_if:type,expense',
        'deposited_in' => 'required',
        'debit' => 'required|exists:accounts,acc_title',
        'credit' => 'required',
        'amount' => 'required|numeric|min:0',
    ]);
        
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    Transaction::create([
        'type' => 'expense',
        'date' => $request->input('date'),
        'payer_payee' =>  $request->input('payer_payee'),
        'particulars' =>  $request->input('particulars'),
        'bank_account' => $request->input('bank_account'),
        'type_of_fund' => $request->input('type_of_fund'),
        'dv_no' => $request->input('dv_no'),
        'deposited_in' => $request->input('deposited_in'),
        'debit' => $request->input('debit'),
        'credit' => $request->input('credit'),
        'amount' => $request->input('amount'),
    ]);

    return redirect()->route('expense.index')
        ->with('success', 'Transaction added successfully.');
}

 public function create()
{
    $accounts = Account::all();
   $transactions=  Transaction::all();
    return view('admin.expense.create', compact('transactions','accounts'));
}
public function edit(Transaction $expense)
{
    $accounts = Account::all();
    return view('admin.expense.edit', compact('expense','accounts'))->with('expense', $expense);
}

  public function update(Request $request, Transaction $expense)
{

    $validator = Validator::make($request->all(), [
        'date' => 'required',
        'payer_payee' => 'required',
        'particulars' => 'required',
        'bank_account' => 'required',
        'type_of_fund' => 'required',
        'dv_no' => 'required',
        'deposited_in' => 'required',
        'debit' => 'required',
        'credit' => 'required',
        'amount' => 'required',
    ]);
        
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }
    
    if ($expense->type !== 'expense') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only update expense transactions.'])
            ->withInput();
    }

    $expense->update($request->all());

    return redirect()->route('expense.index')
        ->with('success','expense to bank updated successfully');
}

public function destroy(Transaction $expense)
{
    // You may want to add additional checks to ensure that the user has permission to delete transactions

    if ($expense->type !== 'expense') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only delete expense transactions.']);
    }

    $expense->delete();
    
    return redirect()->route('expense.index')
        ->with('success','expense to bank deleted successfully');
}
}