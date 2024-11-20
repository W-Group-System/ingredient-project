<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index (){
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }
    public function store(Request $request) 
    {
        $role = new Role();
        $role->name = $request->role_name;
        $role->description = $request->role_description;
        $role->is_active = "1";
        $role->save();

        return redirect()->back()->with('success', 'Role created successfully.');

    }
    public function update(Request $request, $id) 
    {
        $role = Role::findOrFail($id);
        $role->name = $request->role_name;
        $role->description = $request->role_description;           
        $role->save();

        return redirect()->back()->with('success', 'role updated successfully.');

    }
    public function activate($id)
    {
        $role = Role::findOrFail($id);
        $role->is_active = "1";
        $role->save();

        return redirect()->back()->with('success', 'Role activated successfully.');
    }
    public function deactivate($id)
    {
        $role = Role::findOrFail($id);
        $role->is_active = "2";
        $role->save();

        return redirect()->back()->with('success', 'Role deactivated successfully.');
    }
}
