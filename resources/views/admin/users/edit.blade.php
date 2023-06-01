@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_type">User Type:</label>
                <select name="user_type" id="user_type" class="form-control" required>
                    <option value="admin" {{ old('user_type', $user->user_type) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="barangay officials" {{ old('user_type', $user->user_type) === 'barangay officials' ? 'selected' : '' }}>Barangay Official</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
