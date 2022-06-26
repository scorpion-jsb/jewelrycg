<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Http\Requests\PostStoreRequest;



class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('backend.dashboard.blog.posts.list');
    }

    public function get()
    {
        return datatables()->of(BlogPost::query())
        ->addIndexColumn()
        ->editColumn('cover_image', function($row) {
            return "<img src='".$row->cover_image."'>"; 
        })
        ->addColumn('action', function($row){

               $btn = '<a href="'.route('backend.posts.edit', $row->id).'"  class="edit btn btn-info btn-sm">Edit</a>';
               $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
        })
        ->rawColumns(['action', 'cover_image'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dashboard.blog.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $blog = new BlogPost();
        $data = $request->input();
        $data['cover_image'] = $blog->storeImages($request->cover_image);
        $data['tags_id'] = 1;
        $blog->create($data);
        return redirect()->route('backend.posts.list');
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
        return view('backend.dashboard.blog.posts.edit', [
            'post' => BlogPost::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $id)
    {
        $blog = BlogPost::findOrFail($id);
        $data = $request->input();
        if($request->cover_image)
        {
            $data['cover_image'] = $blog->storeImages($request->cover_image);
        }
        $data['tags_id'] = 1;
        $blog->update($data);
        return redirect()->route('backend.posts.list');
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
