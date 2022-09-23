<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index(Request $request) {
        $arrMemberships = [];

        return view('memberships.index', compact(
            'arrMemberships'
        ));
    }
}
