@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/user.css">
</head>
<body>
<div class="container">
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary py-2 px-4 rounded-md mb-6">
        <i class="fas fa-plus mr-2"></i>Add User
    </a>
        <table class="table table-bordered table-light"  style="width: 125%;">
            <thead class="thead" >
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-400">No.</th>
                    <th class="px-6 py-3 border-b-2 border-gray-400">Name</th>
                    <th class="px-6 py-3 border-b-2 border-gray-400">Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-400">User Type</th>
                    <th class="px-6 py-3 border-b-2 border-gray-400">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key=>$user)
                    <tr class="hover:bg-gray-200">
                        <td class="px-6 border-b-2 border-gray-300">{{ $key+1 }}</td>
                        <td class="px-6 border-b-2 border-gray-300">{{ $user->name }}</td>
                        <td class="px-6 border-b-2 border-gray-300">{{ $user->email }}</td>
                        <td class="px-6 border-b-2 border-gray-300">{{ $user->user_type }}</td>
                        <td class="px-6 border-b-2 border-gray-300">


                        <div class="inline-flex">
  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn update_user_form">
    <i class="fas fa-edit text-green-500"></i>
  </a>

  <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn delete_user">
      <i class="fas fa-trash-alt"></i>
    </button>
  </form>
</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links('custom-pagination') }}
</div>

@endsection
</body>
</html>