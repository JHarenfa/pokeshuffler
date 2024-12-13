@extends('main_panel_template.template')
@section('content')
    <section class="container">
        <div class="text-center py-5">
            <h1 style="font-size: 6rem">Thank You!</h1>
            <p style="font-size: 2rem">Your Order ID: {{ $id }}</p>
        </div>
    </section>
@endsection
