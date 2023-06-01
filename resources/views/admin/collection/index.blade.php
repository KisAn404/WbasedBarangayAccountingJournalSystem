@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/transactionstyle.css">
</head>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#collectionModal">
  Add New Collection
</button>
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
             <th class="text-center" style="width: 95px;">Date</th>
            <th class="text-center" style="width: 150px;">Payee</th>    
            <th class="text-center" style="width: 150px;">RCD No.</th>    
            <th class="text-center" style="width: 50px;">OR No.</th>  
            <th class="text-center" style="width: 200px;">Particular</th>
            <th class="text-center" style="width: 150px;">Deposited In</th>
            <th class="text-center" style="width: 150px;">Debit</th>
            <th class="text-center" style="width: 150px;">Credit</th>
            <th class="text-center" style="width: 50px;">Amount</th>
            <th  class="text-center" width="100px">Action</th>
            </tr>
    </thead>
        
        @foreach ($transactions as $collection) 
        <tbody style="margin-bottom: 15px;">
        <tr>
            <td class="text-center" >{{ $collection->id}}</td>
            <td class="text-center">{{ $collection->date }}</td>
             <td class="text-center">{{ $collection->payer_payee }}</td>
              <td class="text-center">{{ $collection->rcd_no }}</td>
               <td class="text-center">{{ $collection->or_no }}</td>
            <td class="text-center">{{ $collection->particulars}}</td>
            <td class="text-center" style="font-size: 10px;">{{ $collection->deposited_in}}</td>
            <td class="text-center"style="font-size: 10px;">{{ $collection->debit}}</td>
            <td class="text-center"style="font-size: 10px;">{{ $collection->credit}}</td>
            <td class="text-right">₱{{ number_format($collection->amount, 2, '.', ',') }}</td>
            <td>
            <form  class="text-center" action="{{ route('collection.destroy',$collection->id) }}" method="POST">
    
              <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $collection->id }}" href="#">
                <i class="fas fa-pencil-alt" style="font-size: 10px;"></i>
            </a>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $collection->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>
                   </form>
<!--Delete Modal -->

<div class="modal fade" id="myModal{{ $collection->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <form action="{{ route('collection.destroy', $collection->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal-{{ $collection->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $collection->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <header>
                  <h5 class="modal-title" id="editModalLabel-{{ $collection->id }}">Edit funds</h5>
              </header>
          </div>
          <div class="modal-body">
              <form action="{{ route('collection.update', $collection->id) }}" method="POST">
                  @csrf
                  @method('PUT')
          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
              <strong>Date</strong>
            <input style="width: 100%" style="height: 50px" type="date" name="date" id="date" value="{{ $collection->date }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Payer</strong>
            <input style="width: 100%" style="height: 50px"type="text" name="payer_payee" id="payer_payee" value="{{ $collection->payer_payee }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Particular</strong>
            <input style="width:  100%" style="height: 50px"type="text" name="particulars" id="particulars" value="{{ $collection->particulars	 }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
            <strong>RCD No.</strong>
            <input style="width:  100%" style="height: 50px" type="text" name="rcd_no" value="{{ $collection->rcd_no }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
            <strong>OR No.</strong>
            <input style="width:  100%" style="height: 50px" type="number" name="or_no" value="{{ $collection->or_no }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Income Account</strong>
            <input style="width:  100%" style="height: 50px"type="text" name="income_acc" value="{{ $collection->income_acc	 }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
        <strong>Deposited In</strong>
          <select style="width: 100%" style="height: 50px"type="select" class="form-control" name="deposited_in" id="deposited_in"required>
                  <option value="Cash in Local Treasury">Cash in Local Treasury</option>   
                  <option value=" Cash in Bank"> Cash in Bank</option>
                  <option value="Cash Advance">Cash Advance</option>   
                  <option value="Petty Cash">Petty Cash</option>   
                </select>
        </div>
          </div>
          </div>

          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
            <strong>Debit</strong>
             <select style="width:  100%" style="height: 50px" type="select"  class="form-control" name="debit" id="debit">
            <option value=""> Select Charts Of Account</option>
             @foreach ($accounts as $account)
                <option value="{{ $account->acc_title }}">{{ $account->acc_title}}
            @endforeach
           </select>
          </div>
            </div>
          </div>

        
          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
            <strong>Credit</strong>
        <select style="width:  100% style="height: 50px" type="select"  class="form-control" name="credit" id="credit">
        <option value=""> Select Charts Of Account</option>
        @foreach ($accounts as $account)
         <option value="{{ $account->acc_title }}">{{ $account->acc_title}}
        @endforeach
       </select>
       </div>
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
            <strong>Amount</strong>
              <input style="width: 100% " style="height: 50px" type="number"  name="amount"value="{{ $collection->amount	}}" class="form-control" min="0.00" step="0.01" required placeholder="">
    
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                </div>
                </div>
                </div>



                

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
{{ $transactions->links('custom-pagination') }}
</div>
 @include('admin.collection.create')
 @endsection