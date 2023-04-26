<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class WithdrawController extends Controller
{
 public function index()
{
    $transactions = Transaction::where('type', 'withdraw')->paginate(4);

    $total = $transactions->sum('amount');
    $latest = Transaction::latest()->first();
    return view('withdraw.index', ['transactions' => $transactions, 'total' => $total,$latest]);
}
   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'type' => 'required|in:collection,expense,deposit,withdraw',
        'date' => 'required',
        'payer_payee' => 'required',
        'bank_account' => 'required',
        'type_of_fund' => 'required',
        'check_no' => 'required_if:type,Withdraw',
        'dv_no' => 'required_if:type,Withdraw,Expense',
        'pb_no' => 'required_if:type,Withdraw',
        'particulars' =>'required',
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
        'check_no' => $request->input('check_no'),
        'dv_no' => $request->input('dv_no'),
        'pb_no' => $request->input('pb_no'),
        'particulars' => $request->input('particulars'),
        'deposited_in' => $request->input('deposited_in'),
        'debit' => $request->input('debit'),
        'credit' => $request->input('credit'),
        'amount' => $request->input('amount'),
    ]);

    return redirect()->route('withdraw.index')
        ->with('success', 'Transaction added successfully.');
}

 public function create()
{
    $accounts = Account::all();
   $transactions=  Transaction::all();
    return view('withdraw.create', compact('transactions','accounts'));
}
public function edit(Transaction $withdraw)
{
    return view('withdraw.edit', compact('withdraw'))->with('withdraw', $withdraw);
}

  public function update(Request $request, Transaction $withdraw)
{

    $validator = Validator::make($request->all(), [
        'date' => 'required',
        'payer_payee' => 'required',
        'bank_account' => 'required',
        'type_of_fund' => 'required',
        'check_no' => 'required',
        'dv_no' => 'required',
        'pb_no' => 'required',
        'particulars' =>'required',
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
    
    if ($withdraw->type !== 'withdraw') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only update withdraw transactions.'])
            ->withInput();
    }

    $withdraw->update($request->all());

    return redirect()->route('withdraw.index')
        ->with('success','withdraw to bank updated successfully');
}

public function destroy(Transaction $withdraw)
{
    // You may want to add additional checks to ensure that the user has permission to delete transactions

    if ($withdraw->type !== 'withdraw') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only delete withdraw transactions.']);
    }

    $withdraw->delete();
    
    return redirect()->route('withdraw.index')
        ->with('success','withdraw to bank deleted successfully');
}
}