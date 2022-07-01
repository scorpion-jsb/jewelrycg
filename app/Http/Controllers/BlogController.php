<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\BlogCategorie;
use App\Models\BlogPostTag;
use App\Models\BlogPostCategorie;

class BlogController extends Controller
{

    public function index()
    {
      
        return view('blog.list', [
            'posts' => BlogPost::with('categories')->get()
        ]);
    }
    public function show($slug)
    {
        return view('blog.show', [
            'post' => BlogPost::where('slug', $slug)->first(),
            'categories' => BlogCategorie::all(),
            'tags' => BlogTags::all()
        ]);
    }
    public function categoryIndex()
    {
        return view('blog.category.list', [
            'categories' => BlogCategorie::all()
        ]);  

    }

}
