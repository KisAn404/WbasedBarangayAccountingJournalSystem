@extends('layouts.app')
  
@section('content')
@if ($errors->any())
<div class="modal show" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Whoops!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

<div style="padding-left: 10%" sytle="margin-top:5%" class="d-flex align-items-center">
    <h1 class="my-header">Add New Accountable Form</h1>   
</div>

<div class="card">
    <div class="card-body" style="background-color: rgb(2, 175, 202)">
        <form action="{{ route('accform.store') }}" method="POST">
            @csrf

            <div class="mb-3 row">
                <label for="form_name" class="col-sm-3 col-form-label">Name of Form</label>
                <select style="width: 50%" style="height: 50px" name="form_name" id="form_name">
                    <option value=" Cash Tickets"> Cash Tickets</option>
                    <option value="Official Receipts">Official Receipts</option>   
                    <option value="Without Money Value">Without Money Value</option>   
                    <option value="With Money Value">With Money Value</option>   
                    <option value="LBP-Talibon">LBP-Talibon</option> 
                    <option value="DBP-Ubay">DBP-Ubay</option> 
                </select>
            </div>

            <div class="mb-3 row">
                <label for="avail_forms" class="col-sm-3 col-form-label">QTY</label>
                <input style="width: 50%" style="height: 50px" type="number" name="avail_forms" required placeholder=""><br>
            </div>

            <div class="mb-3 row">
                <label for ="avail_serialno_from" class="col-sm-3 col-form-label">Beginning Balance From:</label>
                <input style="width: 50%" style="height: 50px" type="number" name="avail_serialno_from" required placeholder=""><br>
            </div>

            <div class="mb-3 row">
                <label for="avail_serialno_to" class="col-sm-3 col-form-label">Beginning Balance To:</label>
                <input style="width: 50%" style="height: 50px" type="number" name="avail_serialno_to" required placeholder=""><br>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
</div>

@endsection
