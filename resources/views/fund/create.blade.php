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
         <a class="btn btn-primary" href="{{ route('fund.index') }}"> Back</a><h1 class="my-header">Add Fund</h1>   
    </div>
    <div class="card">
    <div class="card-body"style="background-color: rgb(2, 175, 202)">
    
<form action="{{ route('fund.store') }}" method="POST">
    @csrf

<div class="mb-3 row" >
    <label for="src_of_fund" class="col-sm-3 col-form-label">Source of Funds:</label>
    <select style="width: 50%" style="height: 50px" name="src_of_fund" id="src_of_fund">
        <option value=" NATIONAL TAX ALLOTMENT"> NATIONAL TAX ALLOTMENT</option>
        <option value="SHARE ON REAL PROPERTY TAX">SHARE ON REAL PROPERTY TAX</option>   
        <option value="BUSINESS TAXES">BUSINESS TAXES</option>   
        <option value="RENT INCOME">RENT INCOME</option>   
         <option value="OTHER PERMITS AND LICENSES">OTHER PERMITS AND LICENSES</option> 
         <option value="REGISTRATION FEES">REGISTRATION FEES</option> 
          <option value="SHARE ON COMMUNITY TAX">SHARE ON COMMUNITY TAX</option> 
           <option value="MISCELLANEOUS TAXES ON GOODS AND SERVICES">MISCELLANEOUS TAXES ON GOODS AND SERVICES</option> 
            <option value="OTHER SERVICES INCOME">OTHER SERVICES INCOME</option> 
             <option value="OTHER TAXES / PERMIT FEE">OTHER TAXES / PERMIT FEE</option> 
              <option value="CLEARANCES AND CERTIFICATION FEES">CLEARANCES AND CERTIFICATION FEES</option> 
               <option value="SUBSIDY FROM PROV. / LGU">SUBSIDY FROM PROV. / LGU</option> 

      </select>
</div>
<div class="mb-3 row" >
    <label for="src_of_fund" class="col-sm-3 col-form-label">New Source of Fund</label>
    <input style="width: 50%" style="height: 50px" type="text" name="src_of_fund" required placeholder=""><br>
</div>

<div class="mb-3 row" >
    <label for="bank_account" class="col-sm-3 col-form-label">Bank Account</label>
    <input style="width: 50%" style="height: 50px" type="text" name="bank_account" required placeholder=""><br>
</div>

     <div class="mb-3 row" >
    <label for ="amount" class="col-sm-3 col-form-label">Amount:</label>
    <input style="width: 50%" style="height: 50px" type="number" name="amount" min="0.00" step="0.00" required placeholder=""><br>
</div>

        <input type="submit" name="Add" value="Add">
</div>
</div>
</form>

@endsection
