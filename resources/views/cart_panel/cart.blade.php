@extends('main_panel_template.template')
@section('content')

    <body>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <section class="h-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0 align-items-start">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            @if (Cart::count() > 0)


                                                <div class="d-flex justify-content-between align-items-center mb-5">
                                                    <h1 class="fw-bold mb-0">Shopping Cart</h1>
                                                    <h6 class="mb-0 text-muted">{{ Cart::count() }} items</h6>
                                                </div>

                                                @if (!empty($cartContent))
                                                    @foreach ($cartContent as $item)
                                                        <hr class="my-4">

                                                        <div
                                                            class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <img src="{{ asset($item->options->productImage) }}"
                                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 class="text-muted">{{ $item->category }}</h6>
                                                                <h6 class="mb-0">{{ $item->name }}</h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                <button data-mdb-button-init data-mdb-ripple-init
                                                                    class="btn btn-link px-2 sub"
                                                                    data-id='{{ $item->rowId }}'>
                                                                    <i class="fas fa-minus"></i>
                                                                </button>

                                                                <input id="form1" min="0" name="quantity"
                                                                    value="{{ $item->qty }}" type="text"
                                                                    class="form-control form-control-sm" />

                                                                <button data-mdb-button-init data-mdb-ripple-init
                                                                    class="btn btn-link px-2 add"
                                                                    data-id='{{ $item->rowId }}'>
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>


                                                            <div class="col-md-3 col-lg-1 col-xl-1 offset-lg-1">
                                                                <h6 class="mb-0">${{ $item->price }}</h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-1 col-xl-1 offset-lg-1">
                                                                <h6 class="mb-0">${{ $item->price * $item->qty }}</h6>
                                                            </div>
                                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                                <a href="javascript:void(0);" role="button"
                                                                    onclick="deleteItem('{{ $item->rowId }}')"><i
                                                                        class="fas fa-times"></i></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @else
                                                <div class="d-flex justify-content-between align-items-center mb-5">
                                                    <h1 class="fw-bold mb-0">Cart is empty!</h1>

                                                </div>
                                            @endif

                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="{{ route('catalog') }}" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i> Back to
                                                        shop</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-body-tertiary ">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">Items {{ Cart::count() }}</h5>
                                                <h5>${{ Cart::subtotal() }}</h5>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">Shipping Cost</h5>
                                                <h5>$0</h5>
                                            </div>


                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Total price</h5>
                                                <h5>${{ Cart::subtotal() }}</h5>
                                            </div>

                                            <a href="{{ route('checkout') }}"><button type="button" data-mdb-button-init
                                                    data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">Checkout</button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
