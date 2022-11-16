<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserChat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $pageTitle;

    public function __constuctor()
    {
        $this->pageTitle = "Home";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userchat = UserChat::where('user_id', Auth::id())->first();
        if (!$userchat) {
            $userchat = new UserChat();
            $userchat->token = md5(uniqid());
            $userchat->user_id = Auth::id();
            $userchat->name = Auth::user()->first_name . " " . Auth::user()->last_name;
            $userchat->user_image = Auth::user()->uploads->file_name;
            $userchat->save();
        }

        return view('backend.dashboard', [
            'title' => $this->pageTitle,
            'activePage' => "dashboard",
            'activeButton' => 'laravel',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}