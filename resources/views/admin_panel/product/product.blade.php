@extends('admin_panel.template.template')
@section('content')
    <div class="container my-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0">Product <small>List</small></h2>
                <a href="{{ url('') }}/add_product" class="btn btn-outline-success btn-sm">Add +</a>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if (count($products) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Rarity</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Image</th>
                                    <th>Image URL</th>
                                    <th>Is Popular</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $row)
                                    <tr>
                                        <td>{{ $row['product_id'] }}</td>
                                        <td>{{ $row['name'] }}</td>
                                        <td>{{ $row['description'] }}</td>
                                        <td>{{ $row['category_id'] }}</td>
                                        <td>{{ $row['rarity_id'] }}</td>
                                        <td>{{ $row['type_id'] }}</td>
                                        <td>${{ number_format($row['price'], 2) }}</td>
                                        <td>{{ $row['stock'] }}</td>
                                        <td>
                                            <img src="{{ asset($row['image_url']) }}" alt="Product Image"
                                                style="max-height: 100px; object-fit: contain; width: auto;"
                                                class="img-fluid rounded">
                                        </td>
                                        <td>{{ $row['image_url'] }}</td>
                                        <td>{{ $row['is_popular'] ? 'Yes' : 'No' }}</td>
                                        <td>{{ $row['date_added'] }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ url('') }}/product_detail/{{ $row['product_id'] }}"
                                                    class="btn btn-outline-primary btn-sm">Detail</a>
                                                <a href="{{ url('') }}/edit_product/{{ $row['product_id'] }}"
                                                    class="btn btn-outline-warning btn-sm">Edit</a>
                                                <form action="{{ route('product.delete', $row['product_id']) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        <ul class="pagination mr-3">
                            @if ($page > 1)
                                <li class="page-item"><a class="page-link"
                                        href="?page={{ $page - 1 }}&perPage={{ $perPage }}">Previous</a></li>
                            @endif

                            @if ($page < $totalPages)
                                <li class="page-item"><a class="page-link"
                                        href="?page={{ $page + 1 }}&perPage={{ $perPage }}">Next</a></li>
                            @endif
                        </ul>
                    @else
                        <p>No products found</p>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
