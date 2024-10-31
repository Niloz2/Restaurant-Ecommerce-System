
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Category Management</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">Add New Category</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Attach confirmDelete with onclick passing category ID and name -->
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $category->id }}, '{{ $category->name }}')">
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
                Are you sure you want to delete <span class="text-danger"><strong id="categoryName"></strong></span>?
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
function confirmDelete(categoryId, categoryName) {
    var deleteModal = document.getElementById('deleteModal');
    var form = document.getElementById('deleteForm');
    var categoryNameElement = document.getElementById('categoryName');
   
    // Dynamically set the form action to the correct delete route
    form.action = '{{ route('admin.category.destroy', ':id') }}'.replace(':id', categoryId);
    // Set category name in modal
    categoryNameElement.textContent = categoryName;

    // Show the modal
    var modal = new bootstrap.Modal(deleteModal);
    modal.show();
}
</script>
@endpush

