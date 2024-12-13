@extends('admin_panel.template.template')
@section('content')
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Edit Category</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('category.update', $category->category_id) }}"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <!-- Category Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ $category->name }}" required>
                    </div>

                    <!-- Form Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
