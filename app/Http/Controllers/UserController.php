<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function edit()
    {
        return view('users.edit');
    }

    public function editPassword()
    {
        return view('users.edit_password');
    }

    public function update(UpdateUserRequest $req)
    {
        auth()->user()->update($req->all());
        return redirect()->route('user.index');
    }

    public function updatePassword(UpdateUserPasswordRequest $req)
    {
        auth()->user()->update([
            'password' => bcrypt($req->new_password)
        ]);
        return redirect()->route('user.index')->with('message', 'Password was Successfully Changed!');
    }

    public function delete()
    {
        auth()->user()->delete();
        return redirect()->route('index');
    }
}
