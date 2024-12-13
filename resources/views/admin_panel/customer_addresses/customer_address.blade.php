@extends('admin_panel.template.template')
@section('content')
    <div class="container my-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0">Customer Addresses <small>List</small></h2>
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
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Country ID</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->user_id }}</td>
                                    <td>{{ $customer->first_name }}</td>
                                    <td>{{ $customer->last_name }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->country_id }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->state }}</td>
                                    <td>{{ $customer->zip }}</td>
                                    <td>{{ $customer->created_at ?? 'N/A' }}</td>
                                    <td>{{ $customer->updated_at ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
