<!-- Modal -->
<div class="modal fade" id="addBankModal" tabindex="-1" aria-labelledby="addBankModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addBankModalLabel">Add Bank Account Balance</h5>
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
            <form action="{{ route('bank.store') }}" method="POST">
              @csrf
              <div class="mb-3 row">
                <label for="as_of" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Beginning Balance as Of</label>
                <input style="width: 70%" style="height: 50px" type="date" class="form-control"  name="as_of" min="0.00" step="0.01" required placeholder=""><br>
              </div>
              <div class="mb-3 row">
                <label for="bank_acc" class="col-sm-3 col-form-label"style="font-size: 18px; margin-left: 10px;">Bank Account</label>
                <select  style="width: 70%" style="height: 50px" type="select" class="form-control"  name="bank_acc" id="bank_acc">
                  <option value="LBP-Talibon">LBP-Talibon</option>
                  <option value="DBP-Ubay">DBP-Ubay</option>
                </select>
              </div>
              <div class="mb-3 row">
                <label for="beg_bal" class="col-sm-3 col-form-label" style="font-size: 18px; margin-left: 10px;">Beginning Balance</label>
                <input style="width: 70%" style="height: 50px" type="number" class="form-control"  name="beg_bal" min="0.00" step="0.01" required placeholder=""><br>
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