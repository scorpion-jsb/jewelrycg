<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserInfoMain extends Component
{
    public function __construct(public bool $edit = false)
    {
    }

    public function render()
    {
        return view('components.user-info-main');
    }
}
