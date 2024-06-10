<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        // $users = User::with('role')->get();
        // return view('users.index', compact('users'));

        // $roles = Role::all();
        // return view('users.index', compact('users','roles'));

        $users = User::with('role')->get();
        $roles = Role::all();

        return view('users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|exists:users|max:255',
            'password' => 'required|string|max:255',
            'confirm_password' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);

        $request->validate([
            'confirm_password' => 'required|same:password',
        ], [
            'confirm_password.same' => 'The password and confirm password must match.',
        ]);

        if (User::where('email', $validatedData['email'])->exists()) {
            return redirect()->route('users.index')->with('error', 'Email already exists.');
        }

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'confirm_password' => bcrypt($validatedData['confirm_password']),
            'role_id' => $validatedData['role_id']
        ]);

        // $user->roles()->attach($validatedData['role_id']);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        'role_id' => 'required|exists:roles,id',

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
