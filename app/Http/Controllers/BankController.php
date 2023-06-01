<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
   public function index()
    {
        $banks = Bank::paginate(6);
        return view('admin.bank.index', compact('banks'));
    }
     
    public function create()
    {
        $banks = Bank::all();
        return view('admin.bank.create', compact('banks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'as_of' => 'required',
            'bank_acc' => 'required',
            'beg_bal' => 'required|numeric|min:0',
        ]);

        Bank::create($request->all());

        return redirect()->route('bank.index')->with('success', 'Added successfully.');
    }

    public function show(Bank $bank)
    {
        // Implement show method logic here
    } 
     
    public function edit(Bank $bank )
    {
        $banks = Bank::all();
        return view('admin.bank.edit', compact('bank', 'banks'));
    }

    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'as_of' => 'required',
            'bank_acc' => 'required',
            'beg_bal' => 'required',
        ]);
        $bank->update($request->all());
    
        return redirect()->route('bank.index')->with('success','Bank updated successfully.');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
    
        return redirect()->route('bank.index')->with('success','Bank deleted successfully.');
    }
}
