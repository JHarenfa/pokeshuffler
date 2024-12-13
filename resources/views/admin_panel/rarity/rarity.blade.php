@extends('admin_panel.template.template')
@section('content')
    <div class="container my-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0">Category <small>List</small></h2>
                <a href="{{ url('add_rarity') }}" class="btn btn-outline-success btn-sm">Add +</a>
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
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rarity as $row)
                                <tr>
                                    <td>{{ $row->rarity_id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <a href="{{ url('edit_rarity/' . $row->rarity_id) }}"
                                            class="btn btn-outline-warning btn-sm">Edit</a>

                                        <form action="{{ route('rarity.delete', $row->rarity_id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $rarity->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
