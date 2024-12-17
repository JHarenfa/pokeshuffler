@extends('admin_panel.template.template')
@section('content')
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Edit Rarity</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('rarity.update', $rarity->rarity_id) }}" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    <!-- Rarity Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Rarity Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $rarity->name }}"
                            required>
                    </div>

                    <!-- Form Buttons -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('type') }}"><button type="button"
                                class="btn btn-outline-danger me-2">Back</button></a>
                        <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
