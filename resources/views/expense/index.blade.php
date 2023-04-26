@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/transactionstyle.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
<a class="btn btn-success" href="{{ route('expense.create') }}">Create New Expenses</a>
</div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered table-light"  style="width: 130%;">
    <thead class="thead" >
            <tr>
                <th class="text-center" style="width: 50px;">Transaction No.</th>
                <th class="text-center" style="width: 50px;">Transaction Type</th>
                <th class="text-center" style="width: 95px;">Date</th>
                <th class="text-center" style="width: 150px;">Payee</th>    
                <th class="text-center" style="width: 150px;">Bank Account</th>
                <th class="text-center" style="width: 80px;">Type Of Fund</th>    
                <th class="text-center" style="width: 50px;">DV No.</th>   
                <th class="text-center" style="width: 50px;">Deposited In</th>
                <th class="text-center" style="width: 50px;">Debit</th>
                <th class="text-center" style="width: 50px;">Credit</th>
                <th class="text-center" style="width: 50px;">Amount</th>
                <th  class="text-center" width="100px">Action</th>
                </tr>
    </thead>
        @foreach ($transactions as $expense) 
        <tbody>
            <tr>
                <td class="text-center">{{ $expense->id}}</td>
                <td class="text-center">{{ $expense->type}}</td>
                <td class="text-center">{{ $expense->date }}</td>
                <td class="text-center">{{ $expense->payer_payee }}</td>
                <td class="text-center">{{ $expense->bank_account}}</td>
                <td class="text-center">{{ $expense->type_of_fund }}</td>
                <td class="text-center">{{ $expense->dv_no }}</td>
                <td class="text-center">{{ $expense->deposited_in}}</td>
                <td class="text-center">{{ $expense->debit}}</td>
                <td class="text-center">{{ $expense->credit}}</td>
                <td class="text-right">₱{{ number_format($expense->amount, 2, '.', ',') }}</td>
                <td>

                    <form class="text-center" action="{{ route('expense.destroy',$expense->id) }}" method="POST">
    <a class="btn btn-primary btn-sm" href="{{ route('expense.edit',$expense->id) }}"><i class="bi bi-pencil"></i></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
</form>



                </td>
            </tr>
        @endforeach
        <tfoot>
  <tr>
    <td colspan="10" class="text-right"><strong>Total expense:</strong></td>
    <td colspan="3" class="text-left font-weight-bold">₱{{ number_format($total, 2, '.', ',') }}</td>
  </tr>
</tfoot>
  </table>
</div>
 {{ $transactions->links() }}
 @endsection
</body>
</html>