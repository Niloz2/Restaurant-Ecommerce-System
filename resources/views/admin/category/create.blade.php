<!-- resources/views/admin/category/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Category</h1>

    <!-- Display Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form for creating a new category -->
    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
