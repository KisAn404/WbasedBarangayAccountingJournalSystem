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
    <a class="btn btn-success" href="{{ route('deposit.create') }}">Create New Deposits</a>
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
                <th class="text-center">Bank Account</th>
                <th class="text-center">Particular</th>
                <th class="text-center">Reference</th>
                <th class="text-center" style="width: 50px;">Deposited In</th>
               <th class="text-center" style="width: 50px;">Debit</th>
               <th class="text-center" style="width: 50px;">Credit</th>
                <th class="text-center" style="width: 50px;">Amount</th>
               <th  class="text-center" width="100px">Action</th>
                </tr>
    </thead>
       
        @foreach ($transactions as $deposit) 
        <tbody>
        <tr>
            <td class="text-center">{{ $deposit->id}}</td>
            <td class="text-center">{{ $deposit->type}}</td>
            <td class="text-center">{{ $deposit->date }}</td>
            <td class="text-center">{{ $deposit->bank_account}}</td>
            <td class="text-center">{{ $deposit->particulars}}</td>
            <td class="text-center">{{ $deposit->deposit_slip_no}}</td>
            <td class="text-center">{{ $deposit->deposited_in}}</td>
            <td class="text-center">{{ $deposit->debit}}</td>
            <td class="text-center">{{ $deposit->credit}}</td>
            <td class="text-right">₱{{ number_format($deposit->amount, 2, '.', ',') }}</td>
            <td>
                <form class="text-center" action="{{ route('deposit.destroy',$deposit->id)  }}" method="POST">
    <a class="btn btn-primary btn-sm" href="{{ route('deposit.edit',$deposit->id)  }}"><i class="bi bi-pencil"></i></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
</form>




            </td>
        </tr>
</tbody>
        @endforeach
   
<tfoot>
  <tr>
    <td colspan="9" class="text-right"><strong>Total deposit:</strong></td>
    <td colspan="3"  class="text-left font-weight-bold">₱{{ number_format($total, 2, '.', ',') }}</td>

  </tr>
</tfoot>
  </table>
</div>
    {{ $transactions->links() }}
@endsection
</body>
</html>