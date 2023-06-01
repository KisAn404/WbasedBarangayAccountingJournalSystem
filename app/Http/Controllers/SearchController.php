<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('q');
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
                ->paginate($perPage); 
    return view('search.results', ['results' => $results]);
}

}
