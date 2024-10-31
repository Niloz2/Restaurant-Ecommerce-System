<!-- resources/views/admin/menu/index.blade.php -->

<!--view lists all menu items-->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Menu Management</h1>
    <!-- Flex container for buttons -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Add New Menu Item</a>
        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Add Menu Category</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->description }}</td>
                <td>Tzs: {{ $menu->price }}</td>
                <td>{{ $menu->category }}</td>
                <td>
                    @if($menu->image)
                        <img src="data:image/jpeg;base64,{{ base64_encode($menu->image) }}" alt="Product Image" style="width: 100px;">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                    <!-- Attach confirmDelete with onclick passing menu ID and name -->
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $menu->id }}, '{{ $menu->name }}')">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span class="text-danger"><strong id="menuName"></strong></span>?
            </div>
            <div class="modal-footer">
                <!-- Form that will be dynamically set to correct delete route -->
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- Button to submit the form -->
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(menuId, menuName) {
    var deleteModal = document.getElementById('deleteModal');
    var form = document.getElementById('deleteForm');
    var menuNameElement = document.getElementById('menuName');
   
    // Dynamically set the form action to the correct delete route
    form.action = '{{ route('admin.menu.destroy', ':id') }}'.replace(':id', menuId);
    // Set menu name in modal
    menuNameElement.textContent = menuName;

    // Show the modal
    var modal = new bootstrap.Modal(deleteModal);
    modal.show();
}
</script>
@endpush
