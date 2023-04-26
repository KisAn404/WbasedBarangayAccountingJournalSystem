@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/transactionstyle.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<body>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
        <a class="btn btn-success" style="  padding-right: 20px" href="{{ route('withdraw.create') }}">Create New withdraws</a>
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
            <th class="text-center">Transaction No.</th>
            <th class="text-center">Transaction Type</th>
            <th class="text-center">Date</th>
            <th class="text-center">Payee</th>    
            <th class="text-center">Bank Account</th>
            <th class="text-center">Type Of Fund</th>
            <th class="text-center">Check No</th>    
            <th class="text-center">DV No</th>  
            <th class="text-center">PB No</th>  
            <th class="text-center">Particular</th>
            <th class="text-center">Deposited In</th>
            <th class="text-center">Debit</th>
            <th class="text-center">Credit</th>
            <th class="text-center" >Amount</th>
            <th  class="text-center" width="280px">Action</th>
        
        </tr>
        </thead>
        @foreach ($transactions as $withdraw) 
        <tbody style="margin-bottom: 15px;">
        <tr>
            <td class="text-center">{{ $withdraw->id}}</td>
            <td class="text-center">{{ $withdraw->type}}</td>
            <td class="text-center">{{ $withdraw->date }}</td>
             <td class="text-center">{{ $withdraw->payer_payee }}</td>
            <td class="text-center">{{ $withdraw->bank_account}}</td>
             <td class="text-center">{{ $withdraw->type_of_fund }}</td>
              <td class="text-center">{{ $withdraw->check_no }}</td>
               <td class="text-center">{{ $withdraw->dv_no }}</td>
               <td class="text-center">{{ $withdraw->pb_no }}</td>
            <td class="text-center">{{ $withdraw->particulars}}</td>
            <td class="text-center">{{ $withdraw->deposited_in}}</td>
            <td class="text-center">{{ $withdraw->debit}}</td>
            <td class="text-center">{{ $withdraw->credit}}</td>
            <td class="text-right">{{ $withdraw->amount }}</td>
            <td>
                <form  class="text-center" action="{{ route('withdraw.destroy',$withdraw->id) }}" method="POST">
    
                    <a class="btn btn-primary btn-sm" href="{{ route('withdraw.edit',$withdraw->id) }}"><i class="bi bi-pencil"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </td>
        </tr>
        </tbody>
        @endforeach
        <tfoot>
  <tr>
    <td colspan="13" class="text-right"><strong>Total Withdraw:</strong></td>
    <td colspan="3" class="text-left font-weight-bold">₱{{ number_format($total, 2, '.', ',') }}</td>

  </tr>
</tfoot>
  </table>
</div>
 {{ $transactions->links() }}
 @endsection
</body>
</html>