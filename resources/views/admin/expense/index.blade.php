@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/transactionstyle.css">
</head>
<body>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
        <button type="button" class="btn btn-primary"href="{{ route('expense.create') }}" data-bs-toggle="modal" data-bs-target="#expenseModal">
  Add New Expense
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
                <th class="text-center" style="width: 40px;">Transaction No.</th>
                <th class="text-center" style="width: 95px;">Date</th>
                <th class="text-center" style="width: 100px;">Payee</th>  
                <th class="text-center" style="width: 200px;">Particulars</th>  
                <th class="text-center" style="width: 95px;">Bank Account</th>
                <th class="text-center" style="width: 80px;">Type Of Fund</th>    
                <th class="text-center" style="width: 130px;">DV No.</th>   
                <th class="text-center" style="width: 50px;">Deposited In</th>
                <th class="text-center" style="width: 50px;">Debit</th>
                <th class="text-center" style="width: 50px;">Credit</th>
                <th class="text-center" style="width: 50px;">Amount</th>
                <th  class="text-center" width="90px">Action</th>
                </tr>
    </thead>
        @foreach ($transactions as $expense) 
        <tbody>
            <tr>
                <td class="text-center">{{ $expense->id}}</td>
                <td class="text-center">{{ $expense->date }}</td>
                <td class="text-center">{{ $expense->payer_payee }}</td>
                <td class="text-center">{{ $expense->particulars}}</td>
                <td class="text-center">{{ $expense->bank_account}}</td>
                <td class="text-center">{{ $expense->type_of_fund }}</td>
                <td class="text-center">{{ $expense->dv_no }}</td>
                <td class="text-center" style="font-size: 10px;">{{ $expense->deposited_in}}</td>
                <td class="text-center" style="font-size: 10px;">{{ $expense->debit}}</td>
                <td class="text-center" style="font-size: 10px;">{{ $expense->credit}}</td>
                <td class="text-center">₱{{ number_format($expense->amount, 2, '.', ',') }}</td>
                <td>

                    <form class="text-center" action="{{ route('expense.destroy',$expense->id) }}" method="POST">
                      <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $expense->id }}" href="#">
                        <i class="fas fa-pencil-alt" style="font-size: 10px;"></i>
                    </a>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $expense->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>
                   </form>


  
<!--Delete Modal -->

<div class="modal fade" id="myModal{{ $expense->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
        <form action="{{ route('expense.destroy',$expense->id) }}" method="POST">
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
<div class="modal fade" id="editModal-{{ $expense->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{$expense->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <header>
                  <h5 class="modal-title" id="editModalLabel-{{ $expense->id }}">Edit funds</h5>
              </header>
          </div>
          <div class="modal-body">
              <form action="{{ route('expense.update', $expense->id) }}" method="POST">
                  @csrf
                  @method('PUT')
          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Date</strong>
            <input type="date" name="date" value="{{ $expense->date }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Payee</strong>
            <input type="text" name="payer_payee" value="{{ $expense->payer_payee }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>
 
          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
            <strong>Type of Fund</strong>
          <select type="select" name="type_of_fund" value="{{ $expense->type_of_fund}}" class="form-control" placeholder="">
            <option value=" 20%"> 20%</option>
            <option value="MOOE">MOOE</option>
            <option value="GFUND">GFUND</option>
            <option value="DST">DST</option>
            <option value="SPA">SPA</option>
            <option value="LGU Aid">LGU Aid</option>
        </select><br>
  </div>
            
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DV No</strong>
                    <input type="text" name="dv_no" value="{{ $expense->dv_no }}" class="form-control" placeholder="">
                </div> 
              </div>
            </div>

          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Particular</strong>
            <input name="particulars" value="{{ $expense->particulars	 }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
            <strong>Bank Account</strong>
          <select name="bank_account" id="bank_account" class="form-control" placeholder=""> 
         <option value="LBP-Talibon">LBP-Talibon</option> 
         <option value="DBP-Ubay">DBP-Ubay</option> 
          </select>
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
              <input style="width: 100% " style="height: 50px" type="number"  name="amount"value="{{ $expense->amount	}}" class="form-control" min="0.00" step="0.01" required placeholder="">

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
        @endforeach
        <tfoot>
  <tr>
    <td colspan="11" class="text-right"><strong>Total expense:</strong></td>
    <td colspan="3" class="text-left font-weight-bold">₱{{ number_format($total, 2, '.', ',') }}</td>
  </tr>
</tfoot>
  </table>
  {{ $transactions->links('custom-pagination') }}
</div>
@include('admin.expense.create')
 @endsection