<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FetchBlogsController extends Controller
{
    // Display a listing of the blogs
    public function fechBlogs()
    {
        $blogs = Blog::all();
        return view('blog.blog', compact('blogs'));
    }
    public function readBlog(Request $request){
        // $blogs = Blog::all();
        $blog = Blog::findOrFail($request->id);
        // dd($blog);
        return view('blog.single', compact('blog'));
    }
}
