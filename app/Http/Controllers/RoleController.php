<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }
    public function update(Request $request, $id) 
    {
        $role = Role::findOrFail($id);
        $role->name = $request->role_name;
        $role->description = $request->role_description;           
        $role->save();

        Alert::success('Successfully Updated')->persistent('Dismiss');
        return back();
    }
    public function activate($id)
    {
        $role = Role::findOrFail($id);
        $role->is_active = "1";
        $role->save();

        Alert::success('Successfully Activated')->persistent('Dismiss');
        return back();
    }
    public function deactivate($id)
    {
        $role = Role::findOrFail($id);
        $role->is_active = "2";
        $role->save();

        Alert::success('Successfully Deactivated')->persistent('Dismiss');
        return back();
    }
}
