@extends('admin_panel.template.template')
@section('content')
    <div class="container my-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0">Orders <small>List</small></h2>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Customer ID</th>
                                <th>Subtotal</th>
                                <th>Shipping</th>
                                <th>Coupon Code</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Country ID</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->user_id }}</td>
                                    <td>${{ number_format($row->subtotal, 2) }}</td>
                                    <td>${{ number_format($row->shipping, 2) }}</td>
                                    <td>{{ $row->coupon_code ?? 'N/A' }}</td>
                                    <td>{{ $row->discount ?? 'N/A' }}</td>
                                    <td>${{ number_format($row->grand_total, 2) }}</td>
                                    <td>{{ $row->first_name }}</td>
                                    <td>{{ $row->last_name }}</td>
                                    <td>{{ $row->phone_number }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->country_id }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>{{ $row->state }}</td>
                                    <td>{{ $row->zip }}</td>
                                    <td>{{ $row->created_at ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
