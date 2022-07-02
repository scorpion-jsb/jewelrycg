<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Http\Requests\PostStoreRequest;
use App\Models\BlogCategorie;
use App\Models\BlogPostTag;
use App\Models\BlogPostCategorie;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('backend.blog.posts.list', [
            'posts' => BlogPost::with('categories')->get()
        ]);
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
        return view('backend.blog.posts.create',[
            'categories' => BlogCategorie::all(),
            'tags' => BlogTags::all()
        ]);
    }

    private function generateSlug($string)
    {
        return str_replace(' ', '-', $string);
    }

    private function registerNewTag($tag)
    {
        $blogtag = BlogTags::create([
            'name' => $tag,
            'slug' => $this->generateSlug($tag),
        ]);
        return $blogtag->id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        $tags = (array)$request->input('tags');
        $categories = (array)$request->input('categories');
        $blog = new BlogPost();
        $data = $request->input();

        $post_id = $blog->create($data)->id;
        foreach( $tags as $tag )
        {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            BlogPostTag::create([
                'id_tag' => $id_tag,
                'id_post' => $post_id
             ]);

        }

        foreach( $categories as $categorie )
        {
            BlogPostCategorie::create([
                'id_category' => $categorie,
                'id_post' => $post_id
             ]);
        }
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
        return view('backend.blog.posts.edit', [
            'post' => BlogPost::whereId($id)->with(['tags', 'categories', 'uploads'])->firstOrFail(),
            'categories' => BlogCategorie::all(),
            'tags' => BlogTags::all()
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
        $tags = (array)$request->input('tags');
        $categories = (array)$request->input('categories');
        
        $blog = BlogPost::findOrFail($id);
        $data = $request->input();

        $blog->update($data);

        BlogPostTag::where('id_post', $blog->id)->delete();
        BlogPostCategorie::where('id_post', $blog->id)->delete();

        foreach( $tags as $tag )
        {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            BlogPostTag::create([
                'id_tag' => $id_tag,
                'id_post' => $blog->id
             ]);
        }

        foreach( $categories as $categorie )
        {
            BlogPostCategorie::create([
                'id_category' => $categorie,
                'id_post' =>  $blog->id
             ]);
        }
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
