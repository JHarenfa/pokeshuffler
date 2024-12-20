@extends('admin_panel.template.template')
@section('content')
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Edit Product</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('product.update', $product->product_id) }}" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ $product->name }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea id="description" name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select id="category" name="category" class="form-control" required>
                            @foreach ($category as $item)
                                <option value="{{ $item->category_id }}"
                                    {{ $product->category_id == $item->category_id ? 'selected' : '' }}>{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Rarity -->
                    <div class="mb-3">
                        <label for="rarity" class="form-label">Rarity <span class="text-danger">*</span></label>
                        <select id="rarity" name="rarity" class="form-control" required>
                            @foreach ($rarity as $item)
                                <option value="{{ $item->rarity_id }}"
                                    {{ $product->rarity_id == $item->rarity_id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                            <option value="" {{ !$product->rarity_id ? 'selected' : '' }}>None</option>
                        </select>
                    </div>

                    <!-- Type -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                        <select id="type" name="type" class="form-control" required>
                            @foreach ($type as $item)
                                <option value="{{ $item->type_id }}"
                                    {{ $product->type_id == $item->type_id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                            <option value="" {{ !$product->type_id ? 'selected' : '' }}>None</option>
                        </select>
                    </div>

                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                        <input type="number" id="stock" name="stock" class="form-control"
                            value="{{ $product->stock }}" required>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($) <span class="text-danger">*</span></label>
                        <input type="number" id="price" name="price" class="form-control"
                            value="{{ $product->price }}" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" id="image_url" value="{{ $product->image_url }}" name="image_url"
                            class="form-control" required>
                        @error('image_url')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Is Popular -->
                    <div class="mb-3">
                        <label for="is_popular" class="form-label">Is Popular <span class="text-danger">*</span></label>

                        <!-- Custom Checkbox -->
                        <div class="form-check">
                            <input type="checkbox" id="is_popular" name="is_popular" class="form-check-input" value="1"
                                {{ $product->is_popular ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_popular">Yes, this product is popular</label>
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('product') }}"><button type="button"
                                class="btn btn-outline-danger me-2">Back</button></a>
                        <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
