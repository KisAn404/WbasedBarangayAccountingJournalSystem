@extends('layouts.app')
   
@section('content')

            <div style="padding-left: 10%" sytle="margin-top:5%" class="d-flex align-items-center">
         <a class="btn btn-primary" href="{{ route('collection.index') }}"> Back</a><h1 class="my-header">Edit Collections</h1>   
    </div>

   
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
  <div class="card">
    <div class="card-body" style="background-color: rgb(2, 175, 202)">
    <form action="{{ route('collection.update',$collection->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 row">
          <label for="date" class="col-sm-3 col-form-label"><strong>Date</strong></label>
                    <input style="width: 50%" style="height: 50px" type="date" name="date" value="{{ $collection->date }}" class="form-control" placeholder="">
            </div>
            
    <div class="mb-3 row">
          <label for="payer_payee" class="col-sm-3 col-form-label"><strong>Payer</strong></label>
                    <input style="width: 50%" style="height: 50px"type="text" name="payer_payee" value="{{ $collection->payer_payee }}" class="form-control" placeholder="">
            </div>
  
 <div class="mb-3 row">
          <label for="particulers" class="col-sm-3 col-form-label"><strong>Particular</strong></label>
                    <input style="width: 50%" style="height: 50px"type="text" name="particulars" value="{{ $collection->particulars	 }}" class="form-control" placeholder="">
    </div>
<div class="mb-3 row">
          <label for="rcd_no" class="col-sm-3 col-form-label"><strong>RCD No</strong></label>
                    <input style="width: 50%" style="height: 50px" type="text" name="rcd_no" value="{{ $collection->rcd_no }}" class="form-control" placeholder="">
            </div>

   <div class="mb-3 row">
          <label for="or_no" class="col-sm-3 col-form-label"><strong>OR No</strong></label>
                    <input style="width: 50%" style="height: 50px" type="number" name="or_no" value="{{ $collection->or_no }}" class="form-control" placeholder="">
            </div>

 <div class="mb-3 row">
          <label for="deposited_in" class="col-sm-3 col-form-label"><strong>Deposited In</strong></label>
                    <input style="width: 50%" style="height: 50px"type="text" name="deposited_in" value="{{ $collection->deposited_in	 }}" class="form-control" placeholder="">
        
                </div>

  <div class="mb-3 row">
          <label for="debit" class="col-sm-3 col-form-label"><strong>Debit</strong></label>
                    <input style="width: 50%" style="height: 50px"type="text" name="debit" value="{{ $collection->debit }}" class="form-control" placeholder="">
    </div>

<div class="mb-3 row">
          <label for="credit" class="col-sm-3 col-form-label"><strong>Credit</strong></label>
                    <input style="width: 50%" style="height: 50px" type="text" name="credit" value="{{ $collection->credit }}" class="form-control" placeholder="">

    </div>

<div class="mb-3 row">
          <label for="amount" class="col-sm-3 col-form-label"><strong>Amount</strong></label>
                    <input style="width: 50%" style="height: 50px" type="number" name="amount" value="{{ $collection->amount }}" class="form-control"  min="0.00" step="0.01" required placeholder="">

    </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 number-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
        </div>
            </div>
   
    </form>
@endsection            
   
 