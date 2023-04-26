<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\Account;
use App\Fund;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CollectionController extends Controller
{
 public function index()
{
    $transactions = Transaction::where('type', 'collection')->paginate(4);

    $total = $transactions->sum('amount');
    $latest = Transaction::latest()->first();
    return view('collection.index', ['transactions' => $transactions, 'total' => $total,$latest]);
}
   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'type' => 'required|in:collection,deposit,expense,withdraw',
        'date' => 'required',
        'payer_payee' => 'required',
        'rcd_no' => 'required_if:type,collection',
        'or_no' => 'required_if:type,collection',
        'particulars' =>'required',
        'deposited_in' => 'required',
        'income_acc'=>'required|exists:funds,src_of_fund',
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
        'rcd_no' => $request->input('rcd_no'),
        'or_no' => $request->input('or_no'),
        'particulars' => $request->input('particulars'),
        'income_acc' => $request->input('income_acc'),
        'deposited_in' => $request->input('deposited_in'),
        'debit' => $request->input('debit'),
        'credit' => $request->input('credit'),
        'amount' => $request->input('amount'),
    ]);

    return redirect()->route('collection.index')
        ->with('success', 'Transaction added successfully.');
}

 public function create()
{
    $accounts = Account::all();
    $funds = Fund::all();
   $transactions=  Transaction::all();
    return view('collection.create', compact('transactions','accounts','funds'));
}
public function edit(Transaction $collection)
{
    return view('collection.edit', compact('collection'))->with('collection', $collection);
}

  public function update(Request $request, Transaction $collection)
{

    $validator = Validator::make($request->all(), [
        'date' => 'required',
        'payer_payee' => 'required',
        'rcd_no' => 'required',
        'or_no' => 'required',
        'particulars' =>'required',
        'income_acc' =>'required',
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
    
    if ($collection->type !== 'collection') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only update Collection transactions.'])
            ->withInput();
    }

    $collection->update($request->all());

    return redirect()->route('collection.index')
        ->with('success','Collection updated successfully');
}

public function destroy(Transaction $collection)
{
    // You may want to add additional checks to ensure that the user has permission to delete transactions

    if ($collection->type !== 'collection') {
        return redirect()->back()
            ->withErrors(['error' => 'You can only delete Collection transactions.']);
    }

    $collection->delete();
    
    return redirect()->route('collection.index')
        ->with('success','Collection deleted successfully');
}

}
