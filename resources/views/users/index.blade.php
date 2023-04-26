@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fdVfUwP25NlDKhUa1y/8V7lK9/9ApV7oF/6fsPLP7FwPxHaQm1mL3yDLxztPI7Kys9rIZaZTDMCZTnT4c4zNUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
h2 {
  text-align: center;
  padding: 20px 0;
}
.table {
    border-radius: 10px;
    border: black;
    
}
.table-create-button {
  text-align: right;
}
.btn-success {
  background-color:#0D98BA;
  border-color: #007bff;
  color: #fff;
}


</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered table-light">
    <!-- Add this row for the "Create New User" button -->
  <tr class="table-create-button">
  <td colspan="5" class="text-end">
  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-plus" style="font-size: 0.9em;"></i> Create New User</a>
  </td>
    </tr>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="180px">Action</th>
    </tr>
@foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                @endforeach
            @endif
        </td>

        <td>
        <a class="btn btn-info" href="#" data-bs-toggle="modal" data-bs-target="#viewModal{{ $user->id }}"><i class="far fa-eye"></i></a>
        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}"><i class="fas fa-edit"></i></a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
         <i class="fas fa-trash-alt"></i>
        </button>
        <!-- Delete  Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
      </div>
      <div class="modal-footer">
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
          <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!}
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Create User Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" style="margin-left: auto; margin-right: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Create New User</h5>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('users.store') }}">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mb-3">
    <label for="password_confirmation" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select class="form-select" aria-label="Select a role" id="role" name="role" required>
      <option value="" selected disabled>Select a role</option>
      <option value="admin">Admin</option>
      <option value="user">User</option>
    </select>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary">Create</button>
  </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- View User Modal -->
<div class="modal fade" id="viewModal{{ $user->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $user->id }}" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" style="margin-left: auto; margin-right: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel{{ $user->id }}">View User Information</h5>
      </div>
      <div class="modal-body">
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Role: {{ $user->role }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" style="margin-left: auto; margin-right: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Edit User</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" aria-label="Select a role" id="role" name="role" required>
              <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    </td>
    </tr>
@endforeach
</table>
@endsection
