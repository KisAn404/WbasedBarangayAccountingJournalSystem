@extends('layouts.app')
@section('content')
<head>
<link rel="stylesheet" href="css/accformstyle.css">
</head>
<div class="container">
<div class="row" style="margin-top: 15px;">
<div class="button">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFormModal">
  Add New Accountable Form
</button>
    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover text-center" style="width: 120%;">
    <thead class="thead" >
        <tr>
                <th class="text-center">Accountable Form No</th>
                <th class="text-center">Name Of Form</th>
                <th class="text-center">Beginning Balance</th>
                <th class="text-center">From</th>
                <th class="text-center">To</th>
                <th class="text-center" width="280px">Action</th>
            </tr>
        </thead>
<tbody>
    @foreach ($acc_forms as $accform)
    <tr class="body">
         <td class="text-center">{{ $accform->id }}</td>
         <td class="text-center">{{ $accform->form_name }}</td>
         <td class="text-center">{{ $accform->avail_forms }}</td>
         <td class="text-center">{{ $accform->avail_serialno_from}}</td>
         <td class="text-center">{{ $accform->avail_serialno_to}}</td>
         <td class="text-center">
                    <form action="{{ route('accform.destroy', $accform->id) }}" method="POST">
                      <a class="btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $accform->id }}" href="#">
                        <i class="fas fa-pencil-alt" style="font-size: 15px;"></i>
                    </a>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $accform->id }}"><i class="fas fa-trash-alt" style="font-size: 10px;"></i></button>
                    </form>

<!--Delete Modal -->

<div class="modal fade" id="myModal{{ $accform->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <form action="{{ route('accform.destroy', $accform->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal-{{ $accform->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $accform->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <header>
                  <h5 class="modal-title" id="editModalLabel-{{ $accform->id }}">Edit Accountable Forms</h5>
              </header>
          </div>
          <div class="modal-body">
              <form action="{{ route('accform.update', $accform->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name of Form</strong>
                            <input type="text" name="form_name" value="{{ $accform->form_name }}" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Quantity</strong>
                            <input type="number" name="avail_forms" value="{{ $accform->avail_forms	 }}" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>From</strong>
                            <input type="number" name="avail_serialno_from" value="{{ $accform->avail_serialno_from	 }}" class="form-control" placeholder="">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>To</strong>
                            <input type="number" name="avail_serialno_to" value="{{ $accform->avail_serialno_to	 }}" class="form-control" placeholder="">
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>

        
              
        </td>
    </tr>
         </tr>
    @endforeach
    {{ $acc_forms->links('custom-pagination') }}
    </table>
    @include('admin.accform.create')
@endsection
