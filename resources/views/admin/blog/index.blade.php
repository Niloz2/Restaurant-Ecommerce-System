@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>All Blogs</h2>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mb-3">Create New Blog</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ Str::limit($blog->content, 100) }}</td>
                            <td>
                                @if ($blog->image)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($blog->image) }}" width="100" alt="{{ $blog->title }}">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
