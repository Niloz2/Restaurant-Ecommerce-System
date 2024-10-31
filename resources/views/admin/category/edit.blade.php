@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to edit the category -->
    <form id="edit-category-form" action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
        </div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmationModal">Update Category</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirm Update</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to update <span class="text-warning"><strong>{{ $category->name }}</strong></span> category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" onclick="submitForm()">Yes, Update</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
    function submitForm() {
        // Submit the form after confirmation
        document.getElementById('edit-category-form').submit();
    }
</script>
@endpush
