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

    /*
    public function update(UpdateUserRequest $req)
    {
        auth()->user()->update($req->all());

        $address1 = UserAddress::where('user_id', auth()->user()->id)->get()->first();
        $address1->address = $req->shipping_address1;
        $address1->address2 = $req->shipping_address2;
        $address1->city = $req->shipping_city;
        $address1->state = $req->shipping_state;
        $address1->country = $req->shipping_country;
        $address1->postal_code = $req->shipping_pin_code;
        $address1->update();

        $address2 = UserAddress::where('user_id', auth()->user()->id)->get()->last();
        $address2->address = $req->billing_address1;
        $address2->address2 = $req->billing_address2;
        $address2->city = $req->billing_city;
        $address2->state = $req->billing_state;
        $address2->country = $req->billing_country;
        $address2->postal_code = $req->billing_pin_code;
        $address2->update();
        return redirect()->route('user.index', auth()->user()->id);
    }*/

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
