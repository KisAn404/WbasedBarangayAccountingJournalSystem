<!-- Modal -->
<div class="modal fade" id="addDepositModal" tabindex="-1" role="dialog" aria-labelledby="DepositModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addDepositModal">Add New Deposit</h5>
    </div>
          <div class="modal-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('deposit.store') }}" method="POST">
                @csrf
                <div class="mb-3 row" >
                <label for ="date" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Date</label>
                <input style="width: 70%" style="height: 50px" type="date" class="form-control" type="date" name="date" id="date" required>
                </div>
    
                <div class="mb-3 row">
                    <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Transaction</label>
                    <input style="width: 70%; height: 50px" type="text" class="form-control" name="type" id="type" value="deposit" readonly>
                </div>
                
    
            <div class="mb-3 row" >
            <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Particulars</label>
                <input style="width: 70%" style="height: 50px" type="text"class="form-control" name="particulars" id="particulars" required>
            </div>
            
            <div class="mb-3 row" >
        <label for="bank_account" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Bank Account:</label>
        <select style="width: 70%" style="height: 50px" type="text"class="form-control" name="bank_account" id="bank_account"required>>   
             <option value="LBP-Talibon">LBP-Talibon</option> 
             <option value="DBP-Ubay">DBP-Ubay</option> 
          </select>
    </div>
            
    <div class="mb-3 row">
        <label for="deposited_in" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Deposited In</label>
        <input style="width: 70%; height: 50px" type="text" class="form-control" name="deposited_in" id="deposited_in" value="Cash in Bank" required>
    </div>

              <div class="mb-3 row" >
        <label for="deposit_slip_no" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Reference</label>
        <input style="width: 70%" style="height: 50px" type="number" class="form-control" name="deposit_slip_no"  id="deposit_slip_no"required>
    </div>
    
  
      <div class="mb-3 row">
        <label for="debit" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Debit</label>
        <input style="width: 70%; height: 50px" type="text" class="form-control" name="debit" id="debit" value="Cash in Bank - Local Currency, Current Account" required>
    </div>
    
      <div class="mb-3 row">
      <label for="credit" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Credit</label>
         <input style="width: 70%; height: 50px" type="text" class="form-control" name="credit" id="credit" value="Cash - In Local Treasury" required>
        </div>
                    

                  <div class="mb-3 row" >
                  <label for ="amount" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Amount:</label>
                  <input style="width: 70% " style="height: 50px" type="number"  class="form-control" name="amount" min="0.00" step="0.01" required>
                  </div>
    
                  <div class="d-flex justify-content-end mt-2">
                    <div class="d-grid mr-3">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
                   </div>
                   <button type="submit" class="btn btn-primary  mr-3">Add</button>
                  </div>
    </form>
    </div>
    </div>
    </div>
    </div>  
    
    
    