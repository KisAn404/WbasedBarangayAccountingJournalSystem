@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/bank.css">
</head>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBankModal">
  Add Bank Account Balance
</button>

    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover text-center" style="width: 120%;">
    <thead class="thead" >
        <tr>
                <th>Bank Account No.</th>
                <th>Balance Beginning As Of</th>
                <th>Bank Account</th>
                <th>Beginning Balance</th>
                <th>Ending Balance</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($banks as $bank)
    <tr>
        <td>{{ $bank->id }}</td>
        <td>{{ $bank->as_of}}</td>
        <td>{{ $bank->bank_acc}}</td>
        <td>{{ $bank->beg_bal }}</td>
        <td>{{ $bank->end_bal }}</td>
        <td>
       <form  class="text-center" action="{{ route('bank.destroy',$bank->id) }}" method="POST">
    
        <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $bank->id }}" href="#">
            <i class="fas fa-pencil-alt" style="font-size: 15px;"></i>
        </a>
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $bank->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>
        </form>

<!--Delete Modal -->
        <div class="modal fade" id="myModal{{ $bank->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <form action="{{ route('bank.destroy', $bank->id) }}" method="POST">
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
<div class="modal fade" id="editModal-{{ $bank->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $bank->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('bank.update', $bank->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <strong>As of</strong>
                        <input type="date" name="as_of" value="{{ $bank->as_of }}" class="form-control" placeholder="as_of">
                    </div>
                    <div class="form-group">
                        <strong>Bank Account</strong>
                        <input type="text" name="bank_acc" value="{{ $bank->bank_acc }}" class="form-control" placeholder="bank_acc">
                    </div>
                    <div class="form-group">
                        <strong>Beginning Balance</strong>
                        <input type="number" name="beg_bal" value="{{ $bank->beg_bal }}" class="form-control" placeholder="beg_bal">
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
@endforeach


        </tbody>
        {{ $banks->links('custom-pagination') }}
    </table>
    @include('admin.bank.create')
@endsection
