<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('setup.roles', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        // Create new role
        $role = Role::create($request->all());

        // return response()->json(['success' => true, 'role' => $role]);
        return redirect()->route('setup.roles')->with('success', 'Role created successfully!');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());

        // return response()->json(['success' => true, 'role' => $role]);
        return redirect()->route('setup.roles')->with('success', 'Role updated successfully!');

    }


    public function destroy(Role $role)
    {
        // Delete role
        $role->delete();

        return redirect()->route('setup.roles')->with('success', 'Role deleted successfully.');
    }
}
