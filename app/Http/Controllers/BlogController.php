<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller {
    // Display a listing of the blogs

    public function index() {
        $blogs = Blog::all();
        return view( 'admin.blog.index', compact( 'blogs' ) );
    }

    // Show the form for creating a new blog

    public function create() {
        return view( 'admin.blog.create' );
    }

    // Store a newly created blog in storage

    public function store( Request $request ) {
        $validated = $request->validate( [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ] );

        $imagePath = $request->file( 'image' )->getRealPath();
        $imageData = file_get_contents( $imagePath );

        Blog::create( [
            'title' => $validated[ 'title' ],
            'content' => $validated[ 'content' ],
            'image' => $imageData, // Store image as binary
        ] );

        return redirect()->route( 'admin.blog.index' )->with( 'success', 'Blog created successfully.' );
    }

    // Show the form for editing the specified blog

    public function edit( Blog $blog ) {
        return view( 'admin.blog.edit', compact( 'blog' ) );
    }

    // Update the specified blog in storage

    public function update( Request $request, Blog $blog ) {
        $validated = $request->validate( [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ] );

        $blog->title = $validated[ 'title' ];
        $blog->content = $validated[ 'content' ];

        if ( $request->hasFile( 'image' ) ) {
            $imagePath = $request->file( 'image' )->getRealPath();
            $imageData = file_get_contents( $imagePath );
            $blog->image = $imageData;
            // Update image as binary
        }

        $blog->save();

        return redirect()->route( 'admin.blog.index' )->with( 'success', 'Blog updated successfully.' );
    }

    // Remove the specified blog from storage

    public function destroy( Blog $blog ) {
        $blog->delete();
        return redirect()->route( 'admin.blog.index' )->with( 'success', 'Blog deleted successfully.' );
    }
}
