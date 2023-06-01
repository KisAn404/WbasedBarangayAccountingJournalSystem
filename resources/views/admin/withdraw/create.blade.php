<!--Create Modal -->
<div class="modal fade" id="addwithdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addwithdrawModal">Add New Withdraw</h5>
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
            <form action="{{ route('withdraw.store') }}" method="POST">
                @csrf
                <div class="mb-3 row" >
                <label for ="date" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;" style="font-size: 18px;margin-left: 10px;">Date</label>
                <input style="width: 70%" style="height: 50px" type="date" class="form-control" type="date" name="date" id="date" required>
                </div>
    
                <div class="mb-3 row">
                    <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Transaction</label>
                    <input style="width: 70%; height: 50px" type="text" class="form-control" name="type" id="type" value="withdraw" readonly>
                </div> 
    
            <div class="mb-3 row" >
        <label for="payer_payee" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Payee</label>
        <input style="width: 70%" style="height: 50px" type="text" class="form-control" name="payer_payee" id="payer_payee" required>
    </div>
    <div class="mb-3 row">
           <label for="type_of_fund" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Type of Fund</label>
             <select style="width: 70%" style="height: 50px" type="select" class="form-control" name="type_of_fund" id="type_of_fund" required>
                <option value=" 20%"> 20%</option>
                <option value="MOOE">MOOE</option>
                <option value="GFUND">GFUND</option>
                <option value="DST">DST</option>
                <option value="SPA">SPA</option>
                <option value="LGU Aid">LGU Aid</option>
            </select><br>
    </div>
    <div class="mb-3 row" >
        <label for="check_no" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Check No</label>
        <input style="width: 70%" style="height: 50px" type="number" class="form-control" name="check_no" id="check_no" required>
    </div>
    
    <div class="mb-3 row" >
        <label for="dv_no" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">DV No</label>
        <input style="width: 70%" style="height: 50px" type="text" class="form-control" name="dv_no" id="dv_no" required>
        </div>
    
    <div class="mb-3 row" >
        <label for="pb_no" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">PB No</label>
        <input style="width: 70%" style="height: 50px" type="text" class="form-control" name="pb_no" id="pb_no" required>
    </div>
    
            <div class="mb-3 row" >
            <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;" style="font-size: 18px;margin-left: 10px;">Particulars</label>
                <input style="width: 70%" style="height: 50px" type="text"class="form-control" name="particulars" id="particulars" required>
            </div>
            
            <div class="mb-3 row" >
        <label for="bank_account" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;"style="font-size: 18px;margin-left: 10px;">Bank Account:</label>
        <select style="width: 70%" style="height: 50px" type="text"class="form-control" name="bank_account" id="bank_account"required>>   
             <option value="LBP-Talibon">LBP-Talibon</option> 
             <option value="DBP-Ubay">DBP-Ubay</option> 
          </select>
    </div>
            
    <div class="mb-3 row">
        <label for="deposited_in" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Deposited In</label>
        <input style="width: 70%; height: 50px" type="text" class="form-control" name="deposited_in" id="deposited_in" value="Cash Advance" required>
    </div>
        
    <div class="mb-3 row">
        <label for="debit" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Debit</label>
           <select style="width:  70%" style="height: 50px" type="select"  class="form-control" name="debit" id="debit" required>
              <option value="">Select Charts Of Account</option>
              @foreach ($accounts->where('acc_type', 'Expenses') as $account)
                  <option value="{{ $account->acc_title }}">{{ $account->acc_title }}</option>
              @endforeach
          </select>
      </div>
              
      <div class="mb-3 row">
        <label for="credit" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Credit</label>
        <input style="width: 70%; height: 50px" type="text" class="form-control" name="credit" id="credit" value="Cash in Bank - Local Currency, Current Account" required>
    </div>
               
                  <div class="mb-3 row" >
                  <label for ="amount" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;"style="font-size: 18px;margin-left: 10px;">Amount:</label>
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