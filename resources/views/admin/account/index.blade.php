@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/transactionstyle.css">
</head>
<div class="container">
    <h3 class="my-header">CHART OF ACCOUNTS</h3>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" >
                <form action="{{ route('account.index') }}" method="GET">
                    <div class="pull-left">
                        <select name="acc_type" id="acc-type-select">
                            <option value="">All Account Types</option>
                            <option value="Assets" {{ $accountType === 'Assets' ? 'selected' : '' }}>Assets</option>
                            <option value="Liabilities" {{ $accountType === 'Liabilities' ? 'selected' : '' }}>Liabilities</option>
                            <option value="Equity" {{ $accountType === 'Equity' ? 'selected' : '' }}>Equity</option>
                            <option value="Revenue" {{ $accountType === 'Revenue' ? 'selected' : '' }}>Revenue</option>
                            <option value="Expenses" {{ $accountType === 'Expenses' ? 'selected' : '' }}>Expenses</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>    
<div class="row" style="margin-top: 15px;">
    <div class="button">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#collectionModal">
      Add New Account
    </button>
        </div>
        </div>
   
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<form action="{{ route('account.index') }}" method="GET">
    <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search...">
    </div>
</form>

    <table class="table table-bordered table-light"  style="width: 130%;">
        <thead class="thead" >
            <tr>
                    <th class="text-center" style="color:white;">Account No.</th>
                    <th class="text-center" style="color:white;">Account Title</th>
                    <th class="text-center" style="color:white;">Account Code</th>
                    <th class="text-center" style="color:white;">Account Category</th>
                    <th class="text-center" style="color:white;">Account Type</th>
                    <th class="text-center" style="color:white;">Action</th>
                </tr>
            </thead>

            @foreach ($accounts as $account) 
            <tbody style="margin-bottom: 15px;">
            <tr>
                        <td class="text-center"> {{ $account->id }}</td>
                        <td class="text-center">{{ $account->acc_title }}</td>
                        <td class="text-center">{{ $account->acc_code }}</td>
                        <td class="text-center">{{ $account->acc_category }}</td>
                        <td class="text-center">{{ $account->acc_type }}</td>
                        <td>
                            <form  class="text-center" action="{{ route('account.destroy',$account->id) }}" method="POST">
                    
                              <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $account->id }}" href="#">
                                <i class="fas fa-pencil-alt" style="font-size: 15px;"></i>
                            </a>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $account->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>
                                   </form>

                                   <!--Delete Modal -->

<div class="modal fade" id="myModal{{ $account->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Confirm Deletion</h5>
        </div>
        <div class="modal-body ">
          Are you sure you want to delete this item?
        </div>
        <div class="modal-footer">
          <form action="{{ route('account.destroy', $account->id) }}" method="POST">
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
  <div class="modal fade" id="editModal-{{ $account->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $account->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <header>
                    <h5 class="modal-title" id="editModalLabel-{{ $account->id }}">Edit Accounts</h5>
                </header>
            </div>
            <div class="modal-body">
                <form action="{{ route('account.update', $account->id) }}" method="POST">
                    @csrf
                    @method('PUT')
    
            <div class="mb-3 row">
              <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group"> 
             <strong>Account Title</strong>
              <input style="width: 100%" style="height: 50px"type="text" name="acc_title" id="acc_title" value="{{ $account->acc_title }}" class="form-control" placeholder="">
              </div>
              </div>
            </div>
  
  
            <div class="mb-3 row">
              <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group"> 
             <strong>Account Code</strong>
              <input style="width:  100%" style="height: 50px"type="text" name="acc_code" id="acc_code" value="{{ $account->acc_code	 }}" class="form-control" placeholder="">
              </div>
              </div>
            </div>
  
  
            <div class="mb-3 row">
              <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group"> 
              <strong>Account Category</strong>
              <input style="width:  100%" style="height: 50px" type="text" name="acc_category" value="{{ $account->acc_category }}" class="form-control" placeholder="">
              </div>
              </div>
            </div>
  
  
            <div class="mb-3 row">
              <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group"> 
              <strong>Account Type</strong>
              <input style="width:  100%" style="height: 50px" type="text" name="acc_type" value="{{ $account->acc_type }}" class="form-control" placeholder="">
              </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
  
                  </form>
                  </div>
                  </div>
                  </div>
  

          </td>
          </tr>
          </tbody>
          @endforeach
    <tfoot>
    
  </tfoot>
  </table>
        {{ $accounts->links('custom-pagination') }}
    <script>
        var select = document.getElementById("acc-type-select");
        select.addEventListener("change", function(event) {
            var selectedValue = event.target.value;
            window.location.href = "{{ route('account.index') }}?acc_type=" + selectedValue;
        });
    </script> 
</div>
@include('admin.account.add_account')
@endsection
