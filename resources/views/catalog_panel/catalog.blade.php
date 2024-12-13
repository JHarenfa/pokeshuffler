@extends('main_panel_template.template')
@section('content')
    <!-- Page content -->

    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center" style="align-items: normal">
                <div class="col-2">
                    <div class="card">
                        <!-- Category Filter -->
                        <article class="filter-group" style="max-width: 300px">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title" style="white-space: nowrap;text-overflow: ellipsis">
                                        Category</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1">
                                <div class="card-body">
                                    <ul class="list-menu"
                                        style="list-style:none;white-space: nowrap;text-overflow: ellipsis">
                                        @foreach ($categoryList as $row)
                                            <li class="pb-2">
                                                <a href="{{ route('catalog', $row->name) }}">{{ $row->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </article>


                    </div>
                </div>

                <!-- Products List -->
                <div class="col" id="products">
                    <div class="row" style="justify-content: flex-start;">
                        @foreach ($products as $product)
                            <!-- Single Product -->
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div id="product-1" class="single-product">
                                    <div class="part-1"
                                        style="background: url('<?php echo asset($product->image_url); ?>') no-repeat center; background-size: contain; transition: all 0.3s">
                                        <ul>
                                            <li><a href="{{ route('detail', $product->product_id) }}"><button
                                                        class="btn btn-outline-success">Details</button></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="part-2">
                                        <h3 class="product-title">{{ $product->name }}</h3>
                                        <h4 class="product-price">${{ $product->price }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

    <!-- /page content -->
@endsection
