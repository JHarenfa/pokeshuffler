@extends('admin_panel.template.template')
@section('content')
    <div class="container mt-5">
        <h2 class="h2">Invoices</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('admin.invoices.filter') }}" class="mb-5">
            <div class="row align-items-end">
                <!-- Month Dropdown -->
                <div class="col-md-4">
                    <label for="month">Month</label>
                    <select name="month" id="month" class="form-control" required>
                        <option value="">Select Month</option>
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>

                <!-- Year Dropdown -->
                <div class="col-md-4">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-control" required>
                        <option value="">Select Year</option>
                        @foreach ($months->pluck('year')->unique() as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Button -->
                <div class="col-md-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-secondary btn-lg" style="border-radius: 20px;">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </div>
        </form>

        <!-- Card Layout for Invoices -->
        <div class="row" id="invoices-container">
            @foreach ($orders as $order)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm invoice-card" id="invoice-{{ $order->id }}">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Invoice #{{ $order->id }}</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Customer:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                            <p><strong>Email:</strong> {{ $order->email }}</p>
                            <p><strong>Phone:</strong> {{ $order->phone_number }}</p>
                            <p><strong>Address:</strong> {{ $order->address }}, {{ $order->state }} - {{ $order->zip }}
                            </p>
                            <hr>
                            <p><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
                            <p><strong>Shipping:</strong> ${{ number_format($order->shipping, 2) }}</p>
                            <p><strong>Discount:</strong> ${{ number_format($order->discount ?? 0, 2) }}</p>
                            <p><strong>Total:</strong> <span
                                    class="text-success">${{ number_format($order->grand_total, 2) }}</span></p>
                            <hr>
                            <h6>Order Items:</h6>
                            <ul>
                                @foreach ($order->orderItems as $item)
                                    <li>{{ $item->name }} (x{{ $item->qty }}) -
                                        ${{ number_format($item->price, 2) }} each</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <!-- Order Date on the Left -->
                            <small>Order Date: {{ $order->created_at->format('F d, Y') }}</small>

                            <!-- Print Button on the Right -->
                            <button onclick="printCard('invoice-{{ $order->id }}')"
                                class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Print All Button -->
        <div class="d-flex justify-content-end mb-3">
            <button id="print-all" class="btn btn-dark">
                <i class="fas fa-print"></i> Print All
            </button>
        </div>


        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
