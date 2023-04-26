@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit funds</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('deposit.index') }}"> Back</a>
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
  
    <form action="{{ route('deposit.update',$deposit->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date</strong>
                    <input type="date" name="date" value="{{ $deposit->date }}" class="form-control" placeholder="">
                </div> 
                </div>
            </div>
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bank Account</strong>
                    <input type="text" name="bank_account" value="{{ $deposit->bank_account	 }}" class="form-control" placeholder="">
        
                </div>
            </div>
     </div>
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Particular</strong>
                    <input type="text" name="particulars" value="{{ $deposit->particulars	 }}" class="form-control" placeholder="">
        
                </div>
            </div>
    </div>
      <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reference</strong>
                    <input type="text" name="deposit_slip_no" value="{{ $deposit->deposit_slip_no	 }}" class="form-control" placeholder="">
        
                </div>
            </div>

       <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Debit</strong>
                    <input type="text" name="debit" value="{{ $deposit->debit }}" class="form-control" placeholder="">
                </div>
            </div>
    </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Credit</strong>
                    <input type="text" name="credit" value="{{ $deposit->credit }}" class="form-control" placeholder="">
                </div>
            </div>
    </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount</strong>
                    <input type="number" name="amount" value="{{ $deposit->amount }}" class="form-control"  min="0.00" step="0.01" required placeholder="">
                </div>
            </div>
    </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 number-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
        </div>
   
    </form>
@endsection