<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    $userTypeCounts = [
        'admin' => 0,
        'barangay officials' => 0,
    ];

    if (!$users->isEmpty()) {
        foreach ($users as $user) {
            $userTypeCounts[$user->user_type]++;
        }
    }

    $users = User::paginate(10);

    return view('admin.users.index', compact('users', 'userTypeCounts'));
}

public function create()
{
    return view('admin.users.create');
}



public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:8',
        'user_type' => 'required'
    ]);

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->user_type = $request->input('user_type');
    $user->save();

    return redirect()->route('users.index')->with('success', 'User added successfully.');
}

public function edit($id)
{
    $user = User::find($id);

    if (!$user) {
        abort(404);
    }

    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'user_type' => 'required|in:admin,barangay officials',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
