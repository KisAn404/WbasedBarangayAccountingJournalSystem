<?php
namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Fund;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DepositController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('type', 'deposit')
            ->latest('created_at')
            ->paginate(10);
    
        $accounts = Account::all();
        $total = Transaction::where('type', 'deposit')->sum('amount');
        $latest = Transaction::latest()->first();
    
        return view('admin.deposit.index', compact('transactions', 'accounts', 'total', 'latest'));
    }
    

   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'date' => 'required',
        'bank_account' => 'required',
        'particulars' =>'required',
        'deposited_in' => 'required',
        'deposit_slip_no' => 'required_if:type,deposit',
        'debit' => 'required',
        'credit' => 'required',
        'amount' => 'required|numeric|min:0',
    ]);
        
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    Transaction::create([
        'type' => 'deposit',
        'date' => $request->input('date'),
        'bank_account' => $request->input('bank_account'),
        'particulars' => $request->input('particulars'),
        'deposited_in' => $request->input('deposited_in'),
        'deposit_slip_no' => $request->input('deposit_slip_no'),
        'debit' => $request->input('debit'),
        'credit' => $request->input('credit'),
        'amount' => $request->input('amount'),
    ]);

    return redirect()->route('deposit.index')
        ->with('success', 'Transaction added successfully.');
}

 public function create()
{
    $accounts = Account::all();
   $transactions=  Transaction::all();
    return view('admin.deposit.create', compact('transactions','accounts'));
}
public function edit(Transaction $deposit)
{
    $accounts = Account::all();
    return view('admin.deposit.edit', compact('deposit','accounts'))->with('deposit', $deposit);
}

  public function update(Request $request, Transaction $deposit)
{

    $validator = Validator::make($request->all(), [
        'date'=>'required',
        'bank_account' => 'required',
        'particulars' =>'required',
        'deposit_slip_no' => 'required',
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
    
    if ($deposit->type !== 'deposit') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only update deposit transactions.'])
            ->withInput();
    }

    $deposit->update($request->all());

    return redirect()->route('deposit.index')
        ->with('success','Deposit to bank updated successfully');
}

public function destroy(Transaction $deposit)
{
    // You may want to add additional checks to ensure that the user has permission to delete transactions

    if ($deposit->type !== 'deposit') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only delete deposit transactions.']);
    }

    $deposit->delete();
    
    return redirect()->route('deposit.index')
        ->with('success','Deposit to bank deleted successfully');
}

}
