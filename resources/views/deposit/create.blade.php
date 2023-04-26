@extends('layouts.app')
  
@section('content')
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
    <div style="padding-left: 10% " class="d-flex align-items-center">
         <a class="btn btn-primary" href="{{ route('deposit.index') }}"> Back</a><h1 class="my-header">Add New Deposit</h1>   
    </div>
    <div class="card">
    <div class="card-body"style="background-color: rgb(2, 175, 202)">
    
<form action="{{ route('deposit.store') }}" method="POST">
    @csrf
    <div class="mb-3 row" >
    <label for ="date" class="col-sm-3 col-form-label">Date:</label>
    <input style="width: 50%" style="height: 50px" type="date" name="date" placeholder=""><br>
    </div>

<div class="mb-3 row" >
    <label for="type" class="col-sm-3 col-form-label">Transaction Type</label>
    <select style="width: 50%" style="height: 50px" name="type" id="type">
    <option value=" Deposit"> Deposit</option>
        <option value="Collection">Collection</option>   
        <option value="Expenses">Expenses</option>   
        <option value="Withdraw">Withdraw</option>     
      </select>
</div>

<div class="mb-3 row" >
    <label for="particulars" class="col-sm-3 col-form-label">Particulars</label>
    <input style="width: 50%" style="height: 50px" type="text" name="particulars" required placeholder=""><br>
</div>

<div class="mb-3 row" >
    <label for="bank_account" class="col-sm-3 col-form-label">Bank Account:</label>
    <select style="width: 50%" style="height: 50px" name="bank_account" id="bank_account">   
         <option value="LBP-Talibon">LBP-Talibon</option> 
         <option value="DBP-Ubay">DBP-Ubay</option> 
      </select>
</div>

  <div class="mb-3 row" >
    <label for="deposited_in" class="col-sm-3 col-form-label">Deposited In</label>
    <select style="width: 50%" style="height: 50px" name="deposited_in" id="deposited_in">
        <option value="Cash in Local Treasury">Cash in Local Treasury</option>   
        <option value=" Cash in Bank"> Cash in Bank</option>
        <option value="Cash Advance">Cash Advance</option>   
        <option value="Petty Cash">Petty Cash</option>   
      </select>
</div>

<div class="mb-3 row" >
    <label for="deposit_slip_no" class="col-sm-3 col-form-label">Reference</label>
    <input style="width: 50%" style="height: 50px" type="number" name="deposit_slip_no" required placeholder=""><br>
</div>

<div class="mb-3 row" >
<label for="debit" class="col-sm-3 col-form-label">Debit:</label>
        <select style="width: 50%" style="height: 50px" name="debit" id="debit">
        @foreach ($accounts as $account)
                <option value="{{ $account->acc_title }}">{{ $account->acc_title}}
        @endforeach
    </select>
</div>

<div class="mb-3 row" >
<label for="credit" class="col-sm-3 col-form-label">Credit:</label>
        <select style="width: 50%" style="height: 50px" name="credit" id="credit">
        @foreach ($accounts as $account)
                <option value="{{ $account->acc_title}}">{{ $account->acc_title}}
        @endforeach
    </select>
</div>
 
     <div class="mb-3 row" >
    <label for ="amount" class="col-sm-3 col-form-label">Amount:</label>
    <input style="width: 50% " style="height: 50px" type="number" name="amount" min="0.00" step="0.01" required placeholder=""><br>
</div>   

 <input type="submit" name="Add" value="Add">
</div>
</div>
</form>

@endsection
