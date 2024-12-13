@extends('admin_panel.template.template')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow">
                    <div class="row g-0">
                        <!-- Product Image -->
                        <div class="col-lg-6 text-center p-4 d-flex align-items-center justify-content-center">
                            <img src="{{ asset($product->image_url) }}" class="img-fluid rounded" alt="Product Image"
                                style="max-height: 300px; object-fit: contain; width: 100%;">
                        </div>

                        <!-- Product Details -->
                        <div class="col-lg-6 p-4">
                            <h1 class="h3 fw-bold mb-3">{{ $product->name }}</h1>
                            <p class="text-muted">{{ $product->description }}</p>

                            <div class="mb-3">
                                <p class="mb-1"><strong>Category:</strong> <span
                                        class="text-capitalize">{{ $category }}</span></p>
                                <p class="mb-1"><strong>Rarity:</strong> <span
                                        class="text-capitalize">{{ $rarity }}</span></p>
                                <p><strong>Type:</strong> <span class="text-capitalize">{{ $type }}</span></p>
                            </div>

                            <div class="mb-4">
                                <h2 class="text-success fw-bold">${{ $product->price }}</h2>
                            </div>

                            <div class="d-grid gap-3">
                                <button type="button" class="btn btn-success btn-lg"
                                    onclick="addToCart({{ $product->product_id }});">
                                    Add to Cart
                                </button>
                                <a href="{{ route('product') }}" class="btn btn-outline-secondary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
