<div class="modal fade" id="add-fund-modal" tabindex="-1" aria-labelledby="#add-fund-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="add-fund-modal-label">Add Fund</h5>
          </div>
          <div class="modal-body">
              <form action="{{ route('fund.store') }}" method="POST">
                  @csrf
{{--               
                  <div class="mb-3 row">
                      <label for="src_of_fund" class="col-sm-3 col-form-label"style="font-size: 18px; margin-left: 10px;">Source of Funds</label>
                      <select style="width: 70%" style="height: 50px" type="select"  class="form-control" name="src_of_fund" id="src_of_fund" required>
                          <option value="">-- Select Source of Funds --</option>
                          <option value="NATIONAL TAX ALLOTMENT"style="font-size: 16px;">NATIONAL TAX ALLOTMENT</option>
                          <option value="SHARE ON REAL PROPERTY TAX" style="font-size: 16px;">SHARE ON REAL PROPERTY TAX</option>
                          <option value="BUSINESS TAXES" style="font-size: 16px;">BUSINESS TAXES</option>
                          <option value="RENT INCOME" style="font-size: 16px;">RENT INCOME</option>
                          <option value="OTHER PERMITS AND LICENSES" style="font-size: 16px;">OTHER PERMITS AND LICENSES</option> 
                          <option value="REGISTRATION FEES" style="font-size: 16px;">REGISTRATION FEES</option> 
                          <option value="SHARE ON COMMUNITY TAX" style="font-size: 16px;">SHARE ON COMMUNITY TAX</option> 
                          <option value="MISCELLANEOUS TAXES ON GOODS AND SERVICES" style="font-size: 16px;">MISCELLANEOUS TAXES ON GOODS AND SERVICES</option> 
                          <option value="OTHER SERVICES INCOME" style="font-size: 16px;">OTHER SERVICES INCOME</option> 
                          <option value="OTHER TAXES / PERMIT FEE" style="font-size: 16px;">OTHER TAXES / PERMIT FEE</option> 
                          <option value="CLEARANCES AND CERTIFICATION FEES" style="font-size: 16px;">CLEARANCES AND CERTIFICATION FEES</option> 
                          <option value="SUBSIDY FROM PROV. / LGU"style="font-size: 16px;">SUBSIDY FROM PROV. / LGU</option> 
                      </select>
                  </div> --}}

                  <div class="mb-3 row">
                      <label for="src_of_fund" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">New Source of Fund</label>
                      <input style="width: 70%" style="height: 50px" type="text" class="form-control" name="src_of_fund" id="src_of_fund" required>
              </div>
          
              <div class="mb-3 row">
                  <label for="amount" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Amount</label>
                  <input style="width: 70%" style="height: 50px" type="number" class="form-control" name="amount" id="amount" min="0.00" step="0.01" required>
              </div>

              <div class="d-flex justify-content-end mt-2">
              <div class="d-grid mr-3">
              <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
             </div>
             <button type="submit" class="btn btn-primary  mr-3">Add Fund</button>
            </div>
          </form>
      </div>
  </div>
</div>
</div>

