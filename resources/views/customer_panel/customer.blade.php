@extends('main_panel_template.template')
@section('content')
    <div class="bg-light text-dark">

        <div class="container my-5">
            <h1 class="text-center mb-4">Order History</h1>

            @foreach ($orders as $order)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <div class="d-flex justify-content-between">
                            <span>Order ID: {{ $order->id }}</span>
                            <span>Placed On: {{ $order->created_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Customer: {{ $order->user ? $order->user->name : 'Unknown' }}
                        </h5>
                        <p class="card-text mb-2">
                            <strong>Email:</strong> {{ $order->user ? $order->user->email : 'Unknown' }}
                        </p>
                        <p class="card-text mb-3">
                            <strong>Phone:</strong> {{ $order->user ? $order->user->phone_number : 'Unknown' }}
                        </p>
                        <h6>Shipping Address:</h6>
                        <p class="card-text">
                            {{ $order->address ?? 'Address not available' }},
                            {{ $order->state ?? 'State not available' }},
                            {{ $order->country ? $order->country->name : 'Country not available' }},
                            {{ $order->zip ?? 'ZIP not available' }}
                        </p>

                        <h6>Order Items:</h6>
                        <table class="table table-borderless table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->price, 2) }}</td>
                                        <td>{{ number_format($item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <h5 class="mb-0"><strong>Grand Total:</strong> {{ number_format($order->grand_total, 2) }}
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($orders->isEmpty())
                <div class="alert alert-secondary text-center">
                    <p>No orders found for this account.</p>
                </div>
            @endif
            {{ $orders->links() }}
        </div>
    </div>
@endsection
