
<!-- Modal -->
<!-- Add this at the top of your add_account.blade.php view -->
@if ($errors->any())
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            @if ($error === 'The acc title has already been taken.')
                                <li>The acc title already exists</li>
                            @elseif ($error === 'The acc code has already been taken.')
                                <li>The acc code already exist</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif





<!-- Rest of your add_account.blade.php view -->

<div class="modal fade" id="collectionModal" tabindex="-1" role="dialog" aria-labelledby="collectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="collectionModalLabel">New Acccount</h5>
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
            <form action="{{ route('account.store') }}" method="POST">
                @csrf
                <div class="mb-3 row" >
                <label for ="acc_title" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Account Title</label>
                <input style="width: 70%" style="height: 50px" type="text" class="form-control" type="text" name="acc_title" id="acc_title" required>
                </div>
    
                <div class="mb-3 row" >
                    <label for ="acc_code" class="col-sm-3 col-form-label" style="font-size: 18px;margin-left: 10px;">Account Code</label>
                    <input style="width: 70%" style="height: 50px" type="text" class="form-control" type="text" name="acc_code" id="acc_code" required>
                    </div>

                    <div class="mb-3 row" >
                        <label for="acc_category" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Account Category</label>
                                <select style="width: 70%" style="height: 50px"type="select" class="form-control"name="acc_category" id="acc_category"required>
                                <option value="Cash">Cash</option>   
                                <option value="Property, Plant and Equipment"> Property, Plant and Equipment</option>
                                <option value="Construction in Progress">Construction in Progress</option>   
                                <option value="RENT INCOME">RENT INCOME</option>
                                <option value="Other Property, Plant and Equipment">Other Property, Plant and Equipment</option>   
                                <option value="Biological Assets">Biological Assets</option>   
                                <option value="Financial Liabilities">Financial Liabilities</option>   
                                <option value="Inter-Agency Payables">Inter-Agency Payables</option>   
                                <option value="OTHER TAXES / PERMIT FEE">Trust Liabilities</option>   
                                <option value="CLEARANCES AND CERTIFICATION FEES">Government Equity</option>   
                                <option value="Revenue from Non-Exchange Transactions">Revenue from Non-Exchange Transactions</option>   
                                <option value="Expenses">Expenses</option>   
                            </select>
                        </div>

                        <div class="mb-3 row" >
                            <label for="acc_type" class="col-sm-3 col-form-label"style="font-size: 18px;margin-left: 10px;">Account Type</label>
                                    <select style="width: 70%" style="height: 50px"type="select" class="form-control"name="acc_type" id="acc_type"required>
                                    <option value="Assets">Assets</option>   
                                    <option value="Liabilities">Liabilities</option>
                                    <option value="Equity">Equity</option>   
                                    <option value="Revenue">Revenue</option>
                                    <option value="Expenses">Expenses</option>   
                                </select>
                            </div>

                  <div class="d-flex justify-content-end mt-2">
                    <div class="d-grid mr-3">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
                   </div>
                   <button type="submit" class="btn btn-primary  mr-3">Add</button>
                  </div>

                  <!-- Add this code at the bottom of your add_account.blade.php view, before the closing </body> tag -->
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.min.js"></script>
<!-- Add this code at the bottom of your add_account.blade.php view, before the closing </body> tag -->
@if ($errors->any())
<script>
    $(document).ready(function() {
        $('#errorModal').modal('show');
    });
</script>
@endif


    </form>
    </div>
    </div>
    </div>
    </div>  
    