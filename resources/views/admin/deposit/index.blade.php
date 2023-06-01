@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/transactionstyle.css">
</head>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDepositModal">
    Add New Deposit
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
                <th  class="text-center" style="width: 95px;">Bank Account</th>
                <th class="text-center" style="width: 200px;">Particular</th>
                <th class="text-center" style="width: 100px;">Reference</th>
                <th class="text-center" style="width: 150px;">Deposited In</th>
               <th class="text-center" style="width: 150px;">Debit</th>
               <th class="text-center" style="width: 150px;">Credit</th>
                <th class="text-center" style="width: 50px;">Amount</th>
               <th  class="text-center" width="100px">Action</th>
                </tr>
    </thead>
       
        @foreach ($transactions as $deposit) 
        <tbody>
        <tr>
            <td class="text-center">{{ $deposit->id}}</td>
            <td class="text-center">{{ $deposit->date }}</td>
            <td class="text-center">{{ $deposit->bank_account}}</td>
            <td class="text-center">{{ $deposit->particulars}}</td>
            <td class="text-center">{{ $deposit->deposit_slip_no}}</td>
            <td class="text-center" style="font-size: 10px;">{{ $deposit->deposited_in}}</td>
            <td class="text-center" style="font-size: 10px;">{{ $deposit->debit}}</td>
            <td class="text-center" style="font-size: 10px;">{{ $deposit->credit}}</td>
            <td class="text-center">₱{{ number_format($deposit->amount, 2, '.', ',') }}</td>
            <td>
                <form class="text-center" action="{{ route('deposit.destroy',$deposit->id)  }}" method="POST">
                  <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $deposit->id }}" href="#">
                    <i class="fas fa-pencil-alt" style="font-size: 10px;"></i>
                </a>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $deposit->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>
                   </form>


 <!--Delete Modal -->

<div class="modal fade" id="myModal{{ $deposit->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
        <form action="{{ route('deposit.destroy', $deposit->id) }}" method="POST">
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
<div class="modal fade" id="editModal-{{ $deposit->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $deposit->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <header>
                  <h5 class="modal-title" id="editModalLabel-{{ $deposit->id }}">Edit funds</h5>
              </header>
          </div>
          <div class="modal-body">
              <form action="{{ route('deposit.update', $deposit->id) }}" method="POST">
                  @csrf
                  @method('PUT')

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Date</strong>
                <input type="date" name="date" value="{{ $deposit->date }}" class="form-control" placeholder="">
              </div> 
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Bank Account</strong>
                <select class="form-control"name="bank_account" id="bank_account" value="{{ $deposit->bank_account }}">
                <option value="LBP-Talibon">LBP-Talibon</option> 
                <option value="DBP-Ubay">DBP-Ubay</option> 
              </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Particular</strong>
                <input type="text" name="particulars" value="{{ $deposit->particulars }}" class="form-control" placeholder="">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Reference</strong>
                <input type="text" name="deposit_slip_no" value="{{ $deposit->deposit_slip_no }}" class="form-control" placeholder="">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Deposited_In</strong>
                <input type="text" name="deposited_in" value="{{ $deposit->deposited_in }}" class="form-control" placeholder="">
              </div>
            </div>
          </div>
   
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Debit</strong>
             <select style="width:  100%" style="height: 50px" type="select"  class="form-control" name="debit" id="debit"required>
            <option value=""> Select Charts Of Account</option>
             @foreach ($accounts as $account)
                <option value="{{ $account->acc_title }}">{{ $account->acc_title}}
            @endforeach
           </select>
          </div>
          
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Credit</strong>
             <select style="width:  100%" style="height: 50px" type="select"  class="form-control" name="credit" id="credit"required>
        <option value=""> Select Charts Of Account</option>
        @foreach ($accounts as $account)
         <option value="{{ $account->acc_title }}">{{ $account->acc_title}}
        @endforeach
       </select>
       </div>

       <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Amount</strong>
              <input style="width: 100% " style="height: 50px" type="number"  name="amount"value="{{ $deposit->amount	}}" class="form-control" name="amount" min="0.00" step="0.01" required>
              </div>

              <div class="d-flex justify-content-end mt-2">
                <div class="d-grid mr-3">
                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
               </div>
               <button type="submit" class="btn btn-primary  mr-3">Save changes</button>
              </div>
</form>
</div>
</div>
</div>
</div>  




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
        {{ $transactions->links('custom-pagination') }}
    </div>
@include('admin.deposit.create')
 @endsection
