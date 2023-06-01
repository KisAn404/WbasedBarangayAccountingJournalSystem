@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit funds</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bank.index') }}"> Back</a>
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
            </ul>*
        </div>
    @endif
  
    <form action="{{ route('bank.update',$bank->id) }}" method="POST">
 @csrf
@method('PUT')
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Beginning Balance</strong>
    <input type="date" name="as_of" value="{{ $bank->as_of }}" class="form-control" placeholder="as_of">
    </div>

    <div class="mb-3 row" >
    <label for="bank_acc" class="col-sm-3 col-form-label"><strong>Bank Account</strong></label>
    <input type="text" name="bank_acc" value="{{ $bank->bank_acc }}" class="form-control" placeholder="bank_acc">
    </div>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Beginning Balance</strong>
        <input type="number" name="beg_bal" value="{{ $bank->beg_bal }}" class="form-control" placeholder="beg_bal">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
         </div>
    
        </form>
@endsection