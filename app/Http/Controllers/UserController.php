<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|string|max:255',
        'confirm_password' => 'required|string|max:255',
    ]);

    $request->validate([
        'confirm_password' => 'required|same:password',
    ], [
        'confirm_password.same' => 'The password and confirm password must match.',
    ]);

    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'confirm_password' => bcrypt($validatedData['confirm_password']),
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully!');
}

public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
    ]);

    $user->update($validatedData);

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}
public function disable(User $user)
{
    $user->update(['is_active' => false]);
    return redirect()->back()->with('success', 'User disabled successfully.');
}

public function activate(User $user)
{
    $user->update(['is_active' => true]);
    return redirect()->back()->with('success', 'User activated successfully.');
}
    
}
