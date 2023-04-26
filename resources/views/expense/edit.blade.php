@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Expenses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('expense.index') }}"> Back</a>
            </div>
        </div>
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
  
    <form action="{{ route('expense.update',$expense->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date</strong>
                    <input type="date" name="date" value="{{ $expense->date }}" class="form-control" placeholder="">
                </div> 
                </div>
            </div>
            
               <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payee</strong>
                    <input type="text" name="payer_payee" value="{{ $expense->payer_payee }}" class="form-control" placeholder="">
                </div> 
                </div>
            </div>
             <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type Of Fund</strong>
                    <input type="text" name="type_of_fund" value="{{ $expense->type_of_fund }}" class="form-control" placeholder="">
                </div> 
                </div>
            </div>
                     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Check No</strong>
                    <input type="number" name="check_no" value="{{ $expense->check_no }}" class="form-control" placeholder="">
                </div> 
                </div>
            </div>

                     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DV No</strong>
                    <input type="text" name="dv_no" value="{{ $expense->dv_no }}" class="form-control" placeholder="">
                </div> 
                </div>
            </div>
 
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Particular</strong>
                    <input type="text" name="particulars" value="{{ $expense->particulars	 }}" class="form-control" placeholder="">
        
                </div>
            </div>
    </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bank Account</strong>
                    <input type="text" name="bank_account" value="{{ $expense->bank_account	 }}" class="form-control" placeholder="">
        
                </div>
            </div>
     </div>
      <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deposited In</strong>
                    <input type="text" name="deposited_in" value="{{ $expense->deposited_in	 }}" class="form-control" placeholder="">
        
                </div>
            </div>

       <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Debit</strong>
                    <input type="text" name="debit" value="{{ $expense->debit }}" class="form-control" placeholder="">
                </div>
            </div>
    </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Credit</strong>
                    <input type="text" name="credit" value="{{ $expense->credit }}" class="form-control" placeholder="">
                </div>
            </div>
    </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount</strong>
                    <input type="number" name="amount" value="{{ $expense->amount }}" class="form-control"  min="0.00" step="0.01" required placeholder="">
                </div>
            </div>
    </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 number-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
        </div>
   
    </form>
@endsection