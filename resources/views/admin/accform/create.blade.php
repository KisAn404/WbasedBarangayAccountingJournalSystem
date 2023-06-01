<!-- Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="addFormModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addFormModalLabel">Add New Accountable Form</h5>
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
          <form action="{{ route('accform.store') }}" method="POST">
            @csrf
  
            <div class="mb-3 row">
              <label for="form_name" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Name of Form</label>
              <select  style="width: 70%" style="height: 50px" type="select" class="form-control" name="form_name" id="form_name" class="form-select" required>
                  <option value="">Choose a form</option>
                  <option value="Cash Tickets">Cash Tickets</option>
                  <option value="Official Receipts">Official Receipts</option>
                  <option value="Without Money Value">Without Money Value</option>
                  <option value="With Money Value">With Money Value</option>
                  <option value="LBP-Talibon">LBP-Talibon</option>
                  <option value="DBP-Ubay">DBP-Ubay</option>
                </select>
              </div>
        
  
            <div class="mb-3 row">
              <label for="avail_forms" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">QTY</label>
              <input style="width: 70%" style="height: 50px" type="number" name="avail_forms" class="form-control" required>
              </div>
          
            <div class="mb-3 row">
              <label for="avail_serialno_from" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Beginning Balance From:</label>
              <input style="width: 70%" style="height: 50px" type="number" name="avail_serialno_from" class="form-control" required>
              </div>
           
            <div class="mb-3 row">
              <label for="avail_serialno_to" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Beginning Balance To:</label>
              <input style="width: 70%" style="height: 50px"t type="number" name="avail_serialno_to" class="form-control" required>
              </div>
            
              <div class="d-flex justify-content-end mt-2">
              <div class="d-grid mr-3">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
              <button type="submit" class="btn btn-primary mr-3">Add</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>