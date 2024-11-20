<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (){
        $users = User::all();
        $roles = Role::all();

        return view('user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
