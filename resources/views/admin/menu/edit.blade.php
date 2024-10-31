<!-- resources/views/admin/menu/edit.blade.php -->

<!--view allows you to edit an existing menu item.-->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Menu Item</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="menu-form" action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ $menu->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $menu->price }}">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category" name="category">
                <option value="Starter" {{ $menu->category == 'Starter' ? 'selected' : '' }}>Starter</option>
                <option value="Main Course" {{ $menu->category == 'Main Course' ? 'selected' : '' }}>Main Course</option>
                <option value="Drinks" {{ $menu->category == 'Drinks' ? 'selected' : '' }}>Drinks</option>
                <option value="Offers" {{ $menu->category == 'Offers' ? 'selected' : '' }}>Offers</option>
                <option value="Our Special" {{ $menu->category == 'Our Special' ? 'selected' : '' }}>Our Special</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($menu->image)
                <img src="data:image/jpeg;base64,{{ base64_encode($menu->image) }}" alt="Product Image" style="width: 100px;">
            @endif
        </div>
        <!-- Button to trigger the confirmation modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">
            Update
        </button>
    </form>
</div>
<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Update</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to update <span class="text-warning"><strong>{{ $menu->name }}</strong></span> menu item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- Button to submit the form -->
                <button type="button" class="btn btn-primary" onclick="submitForm()">Yes, Update</button>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Separate script section to avoid Blade rendering issues -->
@push('scripts')
<script type="text/javascript">
    function submitForm() {
        document.getElementById('menu-form').submit();
    }
</script>
@endpush
