<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index (){
        $users = User::get();
        $roles = $this->roles();

        return view('user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'email:unique:users,email'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt('wgroup123');
        $user->status = 'Active';
        $user->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    public function update(Request $request, $id)
    {
        // dd($request->all(), $id);
        $request->validate([
            'email' => 'email:unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt('wgroup123');
        $user->status = 'Active';
        $user->save();

        Alert::success('Successfully Updated')->persistent('Dismiss');
        return back();
    }

    public function deactivate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Inactive';
        $user->save();

        Alert::success('Successfully Deactivated')->persistent('Dismiss');
        return back();
    }

    public function activate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Active';
        $user->save();

        Alert::success('Successfully Activated')->persistent('Dismiss');
        return back();
    }

    public function roles()
    {
        return [
            'IT' => 'IT System Admin',
            'Plant Manager' => 'Plant Manager'
        ];
    }

    public function changePassword(Request $request,$id)
    {
        // dd($request->all(),$id);
        $this->validate($request, [
            'password' => 'min:6|confirmed'
        ]);

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }
}
