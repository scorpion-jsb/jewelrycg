<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserAddress;
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
        $user = UserAddress::where('user_id', auth()->user()->id)->first();
        $user->address = $req->address1;
        $user->address2 = $req->address2;
        $user->city = $req->city;
        $user->state = $req->state;
        $user->country = $req->country;
        $user->postal_code = $req->pin_code;
        $user->update();
        // auth()->user()->update($req->all());
        // return $req->all();
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
