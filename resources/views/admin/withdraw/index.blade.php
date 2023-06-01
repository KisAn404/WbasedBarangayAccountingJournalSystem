@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/transactionstyle.css">
</head>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addwithdrawModal">
    Add New Withdraw
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
            <th class="text-center" style="width: 130px;">Payee</th>    
            <th class="text-center" style="width: 90px;">Bank Account</th>
            <th class="text-center" style="width: 80px;">Type Of Fund</th>
            <th class="text-center" style="width: 50px;">Check No</th>    
            <th class="text-center" style="width: 50px;">DV No</th>  
            <th class="text-center" style="width: 50px;">PB No</th>  
            <th class="text-center" style="width: 150px;">Particular</th>
            <th class="text-center" style="width: 50px;">Deposited_In</th>
            <th class="text-center" style="width: 50px;">Debit</th>
            <th class="text-center" style="width: 50px;">Credit</th>
            <th class="text-center" style="width: 50px;">Amount</th>
            <th  class="text-center" width="95px">Action</th>
        
        </tr>
        </thead>
        @foreach ($transactions as $withdraw) 
        <tbody style="margin-bottom: 15px;">
        <tr>
            <td class="text-center">{{ $withdraw->id}}</td>
            <td class="text-center">{{ $withdraw->date }}</td>
            <td class="text-center">{{ $withdraw->payer_payee }}</td>
            <td class="text-center">{{ $withdraw->bank_account}}</td>
            <td class="text-center">{{ $withdraw->type_of_fund }}</td>
            <td class="text-center">{{ $withdraw->check_no }}</td>
            <td class="text-center" style="font-size: 10px;">{{ $withdraw->dv_no }}</td>
            <td class="text-center" style="font-size: 10px;">{{ $withdraw->pb_no }}</td>
            <td class="text-center">{{ $withdraw->particulars}}</td>
            <td class="text-center" style="font-size: 10px;">{{ $withdraw->deposited_in}}</td>
            <td class="text-center" style="font-size: 10px;">{{ $withdraw->debit}}</td>
            <td class="text-center" style="font-size: 10px;">{{ $withdraw->credit}}</td>
            <td class="text-center">{{ $withdraw->amount }}</td>
            <td>
                <form  class="text-center" action="{{ route('withdraw.destroy',$withdraw->id) }}" method="POST">
    
                  <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $withdraw->id }}" href="#">
                    <i class="fas fa-pencil-alt" style="font-size: 10px;"></i>
                </a>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $withdraw->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>
                   </form>
                    </form>

<!--Delete Modal -->

<div class="modal fade" id="myModal{{ $withdraw->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
        <form action="{{ route('withdraw.destroy',$withdraw->id) }}" method="POST">
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
<div class="modal fade" id="editModal-{{ $withdraw->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{$withdraw->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <header>
                  <h5 class="modal-title" id="editModalLabel-{{ $withdraw->id }}">Edit funds</h5>
              </header>
          </div>
          <div class="modal-body">
              <form action="{{ route('withdraw.update', $withdraw->id) }}" method="POST">
                  @csrf
                  @method('PUT')
          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Date</strong>
            <input type="date" name="date" value="{{ $withdraw->date }}" class="form-control" placeholder="">
            </div>
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Payee</strong>
            <input type="text" name="payer_payee" value="{{ $withdraw->payer_payee }}" class="form-control" placeholder="">
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
            <strong>Type of Fund</strong>
          <select type="select" name="type_of_fund" value="{{ $withdraw->type_of_fund}}" class="form-control" placeholder="">
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
            <strong>Check No</strong>
            <input type="text" name="check_no" value="{{ $withdraw->check_no }}" class="form-control" placeholder="">
        </div> 
      </div>
    </div>
            
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DV No</strong>
                    <input type="text" name="dv_no" value="{{ $withdraw->dv_no }}" class="form-control" placeholder="">
                </div> 
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>PB No</strong>
                      <input type="text" name="pb_no" value="{{ $withdraw->pb_no }}" class="form-control" placeholder="">
                  </div> 
                </div>
              </div>

          <div class="mb-3 row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
           <strong>Particular</strong>
            <input name="particulars" value="{{ $withdraw->particulars	 }}" class="form-control" placeholder="">
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
              <input style="width: 100% " style="height: 50px" type="number"  name="amount"value="{{ $withdraw->amount	}}" class="form-control" min="0.00" step="0.01" required placeholder="">

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
    <td colspan="13" class="text-right"><strong>Total Withdraw:</strong></td>
    <td colspan="3" class="text-left font-weight-bold">₱{{ number_format($total, 2, '.', ',') }}</td>

  </tr>
</tfoot>
  </table>
  {{ $transactions->links('custom-pagination') }}
</div>
@include('admin.withdraw.create')
 @endsection
