@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/accformstyle.css">
</head>
</body>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="col-lg-0 offset-lg-0">
<div class="button">
        <a class="btn btn-success" style="  padding-right: 20px" href="{{ route('accform.create') }}">Create New Accountable Form</a>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
        <p>{{ $message }}</p>
</div>
    @endif
</div> 
<table class="table table-bordered table-light"  style="width: 120%;">
    <thead class="thead" >
        <tr>
          <th class="text-center"  style="width: 100px;">Accountable Form No.</th>
          <th class="text-center" >Name Of Form</th>
          <th class="text-center" >Beginning Balance</th>
          <th class="text-center" >From</th>
          <th class="text-center" >To</th>
          <th class="text-center" width="150px">Action</th>
        </tr>
    </thead>

    @foreach ($acc_forms as $accform)
<tbody>
        <tr>
          <td class="text-center">{{ $accform->id }}</td>
          <td class="text-center">{{ $accform->form_name }}</td>
          <td class="text-center">{{ '₱' . number_format($accform->avail_forms, 2, '.', '') }}</td>
          <td class="text-center">{{ '₱' . number_format($accform->avail_serialno_from, 2, '.', '') }}</td>
          <td class="text-center">{{ '₱' . number_format($accform->avail_serialno_to, 2, '.', ',') }}</td>
          <td class="text-center">

<form action="{{ route('accform.destroy', $accform->id) }}" method="POST">
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editFormModal"><i class="fas fa-pencil-alt"></i></button>
     @csrf
     @method('DELETE')

    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $accform->id }}">
        <i class="fas fa-trash"></i>
    </button>
</form>

<!-- Create Modal -->

<!-- Edit modal -->
<div class="modal fade" id="editFormModal" tabindex="-1" aria-labelledby="editFormModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editFormModalLabel">Edit Account Form</h5>
    </div>
<div class="modal-body">
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
        <form action="{{ route('accform.update',$accform->id) }}" method="POST">
                @csrf
                @method('PUT')
                    
<div class="mb-3 row">
             <label for="form_name" class="col-sm-3  "style="font-size: 16px;"><strong>Name of Form</strong></label>
             <input style="width: 70%" style="height: 30px" type="text" name="form_name" value="{{ $accform->form_name }}" class="form-control" placeholder="">
</div> 

<div class="mb-3 row" >
             <label for="avail_forms" class="col-sm-3" style="font-size: 16px;"><strong>Quantity</strong></label>
             <input style="width: 70%" style="height:30px" type="number" name="avail_forms" value="{{ $accform->avail_forms }}" class="form-control" placeholder="">
</div>

<div class="mb-3 row">
            <label for="avail_serialno_from" class="col-sm-3" style="font-size: 16px;"><strong>From</strong></label>
            <input style="width: 70%" style="height:30px" type="number" name="avail_serialno_from" value="{{ $accform->avail_serialno_from }}" class="form-control" placeholder="">
</div>        

<div class="mb-3 row">
             <label for="avail_serialno_to" class="col-sm-3"style="font-size: 16px;"><strong>To</strong></label>
             <input style="width: 70%" style="height:30px" type="number" name="avail_serialno_to" value="{{ $accform->avail_serialno_to }}" class="form-control" placeholder="">
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


<!-- Delete modal -->
<div class="modal fade" id="delete-modal-{{ $accform->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $accform->id }}-label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
        <h5 class="modal-title" id="delete-modal-{{ $accform->id }}-label">Delete Account Form</h5>
</div>

<div class="modal-body">
        <p>Are you sure you want to delete this account form?</p>
</div>

<div class="modal-footer">
        <form action="{{ route('accform.destroy', $accform->id) }}" method="POST">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
</form>
</div>
</div>
</div>
</div>

</td>
</tr>
</tr>
</tbody>
    @endforeach
</table>
</div>
    {{ $acc_forms->links() }}
@endsection
</body>
</html>