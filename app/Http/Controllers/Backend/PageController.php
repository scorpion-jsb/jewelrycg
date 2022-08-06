<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Auth;
use App\Http\Requests\PageStoreRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.index')->with(['pages' => Page::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all(['name', 'id']);
        return view('backend.page.create')->with('parents', $pages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $parent = Page::find($request->parent_id);

        $url = $request->slug;
        if ($parent) {
            $url = $parent->url . '/' . $request->slug;
        }

        $page = new Page;

        $page->status = $request->status;
        $page->name = $request->name;
        $page->post = $request->post;
        $page->slug = $request->slug;
        $page->url = $url;
        $page->parent_id = $request->parent_id;
        $page->author_id = Auth::user()->id;
        $page->save();        

        return redirect()->route('backend.page.edit', $page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = Page::all(['name', 'id']);

        return view('backend.page.edit')->with(['page' => Page::find($id), 'parents' => $pages]);
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
        $parent = Page::find($request->parent_id);

        $url = $request->slug;
        if ($parent) {
            $url = $parent->url . '/' . $request->slug;
        }

        $page = Page::find($id);

        $page->status = $request->status;
        $page->name = $request->name;
        $page->post = $request->post;
        $page->url = $url;
        $page->slug = $request->slug;
        $page->parent_id = $request->parent_id;
        $page->author_id = Auth::user()->id;
        $page->save();

        return redirect()->route('backend.page.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::destroy($id);

        return redirect()->route('backend.page.index');
    }
}
