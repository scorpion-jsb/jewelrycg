<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class UriController extends Controller
{
/**
     * Show the page for the given slug.
     *
     * @param  string  $request uri
     * @return Response
     */
    public function __invoke(Request $request)
    {

        $request_path = $request->path();

        // $request_path_array = explode('/', $request_path);
        $page = Page::where('url', $request_path)->first();

        if ($page) {
            return view('page')->with('page', $page);
        } else {
            return view('errors.404');
        }
    }
}
