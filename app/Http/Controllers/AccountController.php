<?php
  
namespace App\Http\Controllers;
   
use App\Models\Account;
use Illuminate\Http\Request;
  
class AccountController extends Controller{
    public function index(Request $request)
    {
        $perPage = 10; // Define the number of records to display per page
        $accountType = $request->input('acc_type');
        $search = $request->input('search');
        
        // Get the accounts based on the selected account type, if any
        $accounts = Account::when($accountType, function ($query, $accountType) {
                            return $query->where('acc_type', $accountType);
                        })
                        ->when($search, function ($query, $search) {
                            return $query->where('acc_title', 'LIKE', '%' . $search . '%')
                                         ->orWhere('acc_code', 'LIKE', '%' . $search . '%');
                        })
                        ->orderBy('id', 'desc') // Sort the accounts in descending order based on the 'id' column
                        ->paginate($perPage);
        
        // Append the original query parameters to the pagination links
        $accounts->appends(['acc_type' => $accountType, 'search' => $search]);
        
        return view('admin.account.index', compact('accounts', 'accountType', 'search'));
    }
    
  
     
public function create()
{
    $accounts = Account::all();
    return view('account.add_account', compact('accounts'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'acc_title' => 'required|unique:accounts',
        'acc_code' => 'required|unique:accounts',
        'acc_category' => 'required',
        'acc_type' => 'required',
    ]);

    Account::create($request->all());

    return redirect()->route('account.index')->with('success', 'Added successfully.');
}


public function show(Account $account)
{
    // Implement show method logic here
} 
 
public function edit(Account $account )
{
    $accounts = Account::all();
    return view('admin.account.edit', compact('account', 'accounts'));
}

public function update(Request $request, Account $account)
{
    $request->validate([
        'acc_title' => 'required',
        'acc_code' => 'required',
        'acc_category' => 'required',
        'acc_type' => 'required',
    ]);
    $account->update($request->all());

    return redirect()->route('account.index')->with('success','Account updated successfully.');
}

public function destroy(Account $account)
{
    $account->delete();

    return redirect()->route('account.index')->with('success','Account deleted successfully.');
}
}