<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\View\Component;

class UserInfoMain extends Component
{

    public function __construct(public bool $edit = false, public User $user, public UserAddress $shipping, public UserAddress $billing)
    {
        // $this->shipping_address = $shipping_address;
    }

    public function render()
    {
        return view('components.user-info-main');
    }
}