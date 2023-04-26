@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit funds</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('fund.index') }}"> Back</a>
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
  
    <form action="{{ route('fund.update',$fund->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Source of Fund</strong>
                    <input type="text" name="src_of_fund" value="{{ $fund->scr_of_fund }}" class="form-control" placeholder="src_of_fund">
        
                </div>
            </div>
            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Bank Account</strong>
                    <input type="text" name="bank_account" value="{{ $fund->bank_account }}" class="form-control" placeholder="bank_account">
                    </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Amount</strong>
                                        <input type="text" name="amount" value="{{ $fund->amount }}" class="form-control" placeholder="amount">
                                    </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
        </div>
   
    </form>
@endsection