
<!-- Modal -->
<div class="modal fade" id="collectionModal" tabindex="-1" role="dialog" aria-labelledby="collectionModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="collectionModalLabel">Add New Collection</h5>
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
        <form action="{{ route('collection.store') }}" method="POST">
            @csrf

            <div class="mb-3 row">
                <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Transaction</label>
                <input style="width: 70%; height: 50px" type="text" class="form-control" name="type" id="type" value="collection" readonly>
            </div>            
                     
            <div class="mb-3 row" >
            <label for ="date" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Date</label>
            <input style="width: 70%" style="height: 50px" type="date" class="form-control" type="date" name="date" id="date" required>
            </div>
            
        <div class="mb-3 row" >
        <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Payee</label>
            <input style="width: 70%" style="height: 50px" type="text"class="form-control" name="payer_payee"  id="payer_payee" required>
        </div>

        <div class="mb-3 row">
            <label for="particulars" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Particular</label>
            <select style="width:  70%" style="height: 50px" type="select" class="form-control" name="particulars" id="particulars" required>
              <option value="barangay certification">Barangay Certification</option>
              <option value="barangay clearance">Barangay Clearance</option>
              <option value="cedula">Cedula</option>
              <option value="other">Other</option>
            </select>
          </div>
          
          <div class="mb-3 row" id="other-option" style="display:none;">
            <div class="col-sm-9">
              <div style="margin-left: 195px;">
                <input style="width:150%" style="height: 50px" type="text" class="form-control" name="other-input" id="other-input" placeholder="Other Particular">
              </div>
            </div>
          </div>
          
          <script>
            var select = document.getElementById("particulars");
            var otherOption = document.getElementById("other-option");
            var otherInput = document.getElementById("other-input");
          
            select.addEventListener("change", function() {
              if (select.value === "other") {
                otherOption.style.display = "block";
                otherInput.value = "";
                otherInput.required = true;
              } else {
                otherOption.style.display = "none";
                otherInput.value = select.value;
                otherInput.required = false;
              }
            });
          </script>
          
        
    
  
        
        <div class="mb-3 row" >
        <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">RCD No</label>
            <input style="width: 70%" style="height: 50px" type="text"class="form-control"  name="rcd_no" id="rcd_no" required>
        </div>

        <div class="mb-3 row" >
        <label for="type" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">OR No</label>
            <input style="width: 70%" style="height: 50px" type="number" class="form-control"name="or_no" id="or_no" required>
        </div>
        <div class="mb-3 row">
            <label for="income_acc" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Income Account</label>
               <select style="width:  70%" style="height: 50px" type="select"  class="form-control" name="income_acc" id="income_acc"required>
                  <option value="">Select Revenue</option>
                  @foreach ($accounts->where('acc_type', 'Revenue') as $account)
                      <option value="{{ $account->acc_title }}">{{ $account->acc_title }}</option>
                  @endforeach
              </select>
          </div>
          <div class="mb-3 row">
            <label for="deposited_in" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Deposited In</label>
            <input style="width: 70%; height: 50px" type="text" class="form-control" name="deposited_in" id="deposited_in" value="Cash - In Local Treasury" required>
        </div>

          <div class="mb-3 row">
            <label for="debit" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Debit</label>
            <input style="width: 70%; height: 50px" type="text" class="form-control" name="debit" id="debit" value="Cash - In Local Treasury" required>
        </div>
        
          <div class="mb-3 row">
          <label for="credit" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Credit</label>
             <select style="width:  70%" style="height: 50px" type="select"  class="form-control" name="credit" id="credit"required>
                <option value="">Select Charts Of Account</option>
                @foreach ($accounts->where('acc_type', 'Revenue') as $account)
                    <option value="{{ $account->acc_title }}">{{ $account->acc_title }}</option>
                @endforeach
            </select>
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
