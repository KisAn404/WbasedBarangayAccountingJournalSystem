<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fund;


class FundController extends Controller
{
    public function index()
    {
    $funds = Fund::paginate(6);
    $totalFunds = Fund::sum('amount');
    $latestFund = Fund::latest()->first();
    return view('fund.index', compact('funds', 'totalFunds','latestFund'));

    }
     
    public function create()
{
    $funds = Fund::all();
    return view('fund.create', compact('funds'));
}

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'src_of_fund' => 'required',
        'amount' => 'required|numeric|min:0',
    ]);

    $fund = Fund::where('src_of_fund', $validatedData['src_of_fund'])
                ->first();

    if (!$fund) {
        $fund = new Fund;
        $fund->src_of_fund = $validatedData['src_of_fund'];
    }

    $fund->amount += $validatedData['amount'];
    $fund->save();

    $totalFunds = Fund::sum('amount');

    return redirect()->route('fund.index', compact('totalFunds'))
                     ->with('success', 'Fund added successfully.');
}


    public function show(fund $fund)
    {

    } 
     
    public function edit(Fund $fund)
    {
        return view('fund.edit',compact('fund'));
    }

    public function update(Request $request, Fund $fund)
    {
        $request->validate([
            'src_of_fund' => 'required',
            'amount' => 'required',
        ]);
        $fund->update($request->all());
    
        return redirect()->route('fund.index')
                        ->with('success','fund updated successfully');
    }
    public function destroy(Fund $fund)
    {
        $fund->delete();
    
        return redirect()->route('fund.index')
                        ->with('success','fund deleted successfully');
    }
}