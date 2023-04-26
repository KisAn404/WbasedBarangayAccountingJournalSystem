<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ExpensesController extends Controller
{
 public function index()
{
    $transactions = Transaction::where('type', 'expense')->paginate(4);

    $total = $transactions->sum('amount');
    $latest = Transaction::latest()->first();
    return view('expense.index', ['transactions' => $transactions, 'total' => $total,$latest]);
}
   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'type' => 'required|in:collection,expense,deposit,withdraw',
        'date' => 'required',
        'payer_payee' => 'required',
        'bank_account' => 'required',
        'type_of_fund' => 'required',
        'dv_no' => 'required_if:type,expense',
        'deposited_in' => 'required',
        'debit' => 'required|exists:accounts,acc_title',
        'credit' => 'required|exists:accounts,acc_title',
        'amount' => 'required|numeric|min:0',
    ]);
        
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    Transaction::create([
        'type' => $request->input('type'),
        'date' => $request->input('date'),
        'payer_payee' =>  $request->input('payer_payee'),
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
    return view('expense.create', compact('transactions','accounts'));
}
public function edit(Transaction $expense)
{
    return view('expense.edit', compact('expense'))->with('expense', $expense);
}

  public function update(Request $request, Transaction $expense)
{

    $validator = Validator::make($request->all(), [
        'date' => 'required',
        'payer_payee' => 'required',
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