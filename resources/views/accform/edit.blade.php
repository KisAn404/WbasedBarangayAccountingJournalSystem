@extends('layouts.app')
   
@section('content')

<div style="padding-left: 10%" sytle="margin-top:5%" class="d-flex align-items-center">
         <a class="btn btn-primary" href="{{ route('accform.index') }}"> Back</a><h1 class="my-header">Edit Accountable Form</h1>   
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
  <div class="card">
    <div class="card-body" style="background-color: rgb(2, 175, 202)">
    <form action="{{ route('accform.update',$accform->id) }}" method="POST">
        @csrf
        @method('PUT')

      <div class="mb-3 row">
          <label for="form_name" class="col-sm-3 col-form-label"><strong>Name of Form</strong></label>
                    <input style="width: 50%" style="height: 50px"type="text" name="form_name" value="{{ $accform->form_name }}" class="form-control" placeholder="">
                </div> 

     <div class="mb-3 row" class="col-sm-3 col-form-label">
          <label for="avail_forms" class="col-sm-3 col-form-label"><strong>Quantity</strong></label>
                    <input style="width: 50%" style="height: 50px" type="number" name="avail_forms" value="{{ $accform->avail_forms	 }}" class="form-control" placeholder="">
     </div>

  <div class="mb-3 row" >
          <label for="avail_serialno_from" class="col-sm-3 col-form-label"><strong>From</strong></label>
                    <input style="width: 50%" style="height: 50px"  type="number" name="avail_serialno_from" value="{{ $accform->avail_serialno_from	 }}" class="form-control" placeholder="">
                </div>        
<div class="mb-3 row">
          <label for="avail_serialno_to" class="col-sm-3 col-form-label"><strong>To</strong></label>
                    <input style="width: 50%" style="height: 50px" type="number" name="avail_serialno_to" value="{{ $accform->avail_serialno_to	 }}" class="form-control" placeholder="">
        
                </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 number-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
        </div>
   
    </form>
@endsection