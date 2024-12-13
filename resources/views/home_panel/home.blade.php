@extends('main_panel_template.home_template')
@section('content')
    <div class="textMid">
        <div class="content">
            <h1>PokeShuffler</h1>
            <h2 class="h2">Haven for Pokemon TCG enjoyers!</h2>
            <a href="{{ route('catalog') }}"><button class="btn btn-outline-light pt-2 mt-2">Shop Now</button></a>
        </div>
    </div>
    </div>
    <!-- Menu -->
    <div id="menu">
        <div class="container-fluid container-img mt-5">
            <h1 class="subtitle">Available Here!</h1>
            <p class="subtitle-desc">These are types of products we have here</p>
            <div class="category-list">
                @foreach ($category as $item)
                    <div>
                        <a href="{{ route('catalog', $item->name) }}">
                            <i class="fa-solid fa-clone fa-fade"></i>
                            <h2>{{ $item->name }}</h2>
                            <p>In PokeShuffler, you can find items related to {{ $item->name }} with various types and
                                rarities!
                            </p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- About -->
    <div id="about">
        <div class="container-fluid about-bg mt-5 pt-5 pb-5">
            <div class="about-col p-5 container">
                <h1 class="subtitle">About Us</h1>
                <p>
                    Welcome to PokeShuffler, your go-to marketplace for buying and selling Pokémon
                    Trading Card Game (TCG) cards. Whether you're a seasoned collector or a newcomer looking to dive into
                    the
                    world of Pokémon TCG, we offer a platform where you can find, trade, and connect with fellow
                    enthusiasts.
                    Our mission is to make the process of acquiring rare, valuable, and collectible cards simple and secure,
                    with an easy-to-navigate interface and a trusted community of sellers and buyers. Join us today and
                    expand
                    your Pokémon TCG collection while discovering exciting new cards from around the world!
                </p>
            </div>
        </div>
    </div>


    <!-- Popular -->

    <div id="popular">
        <div class="container">
            <h1 class="subtitle">Popular Now</h1>
            <p class="subtitle-desc">These are some of the most viewed products this past week</p>

            <section class="section-products">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        @foreach ($home as $product)
                            @if ($product->is_popular == true)
                                <!-- Single Product -->
                                <div class="col-md-6 col-lg-4 col-xl-3">
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
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>
@endsection


</html>
