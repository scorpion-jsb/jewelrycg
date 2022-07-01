<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogCategory;
use App\Blog;

class BlogController extends Controller
{

    public function index()
    {
      
        return view('blog.list', [
            'posts' => BlogPost::with('categories')->get()
        ]);
    }
/*
    public function index() {
        $categories = BlogCategory::groupBy('slug')->get();
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->paginate(12);
        return view("blog.listing", compact('blogs','categories'));
    }
    
    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->first();
        $blogs = Blog::where('status', 1)->where('category_id',$category->id)->orderBy('created_at', 'desc')->paginate(12);
        return view("blog.category", compact('blogs','category'));
    }
    public function blog_details($slug) {
        $blog = Blog::where('slug', $slug)->first();
        return view("blog.details", compact('blog'));
    }
    */

}
