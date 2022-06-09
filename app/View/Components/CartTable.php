<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CartTable extends Component
{
    public function __construct(public bool $checkout = false)
    {
    }

    public function render()
    {
        return view('components.cart-table');
    }
}
