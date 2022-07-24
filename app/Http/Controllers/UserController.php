<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(int $id_user)
    {
        $user = User::findOrFail($id_user);
        $this->authorize('seeInfo', $user);
        return view('users.index', compact('user'));
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
        return redirect()->route('user.index', auth()->user()->id);
    }

    public function updatePassword(UpdateUserPasswordRequest $req)
    {
        auth()->user()->update([
            'password' => bcrypt($req->new_password)
        ]);
        return redirect()->route('user.index', auth()->user()->id)->with('message', 'Password was Successfully Changed!');
    }

    public function delete()
    {
        auth()->user()->delete();
        return redirect()->route('index');
    }
}
