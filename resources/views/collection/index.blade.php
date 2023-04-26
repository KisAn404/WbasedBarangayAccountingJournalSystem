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
    <a class="btn btn-success" href="{{ route('collection.create') }}">Create New Collections</a>
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
            <th class="text-center">Payee</th>    
            <th class="text-center" style="width: 150px;">RCD No.</th>    
            <th class="text-center" style="width: 50px;">OR No.</th>  
            <th class="text-center">Particular</th>
            <th class="text-center" style="width: 50px;">Deposited In</th>
            <th class="text-center" style="width: 50px;">Debit</th>
            <th class="text-center" style="width: 50px;">Credit</th>
            <th class="text-center" style="width: 50px;">Amount</th>
            <th  class="text-center" width="100px">Action</th>
            </tr>
    </thead>
        
        @foreach ($transactions as $collection) 
        <tbody style="margin-bottom: 15px;">
        <tr>
            <td class="text-center" >{{ $collection->id}}</td>
            <td class="text-center">{{ $collection->type}}</td>
            <td class="text-center">{{ $collection->date }}</td>
             <td class="text-center">{{ $collection->payer_payee }}</td>
              <td class="text-center">{{ $collection->rcd_no }}</td>
               <td class="text-center">{{ $collection->or_no }}</td>
            <td class="text-center">{{ $collection->particulars}}</td>
            <td class="text-center">{{ $collection->deposited_in}}</td>
            <td class="text-center">{{ $collection->debit}}</td>
            <td class="text-center">{{ $collection->credit}}</td>
            <td class="text-right">₱{{ number_format($collection->amount, 2, '.', ',') }}</td>
            <td>
            <form class="text-center" action="{{ route('collection.destroy',$collection->id) }}" method="POST">
    <a class="btn btn-primary btn-sm" href="{{ route('collection.edit',$collection->id) }}"><i class="bi bi-pencil"></i></a>
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
    <td colspan="10" class="text-right"><strong>Total collection:</strong></td>
    <td colspan="3" class="text-left font-weight-bold">₱{{ number_format($total, 2, '.', ',') }}</td>
  </tr>
</tfoot>
</table>
</div>
 {{ $transactions->links() }}
 @endsection
</body>
</html>