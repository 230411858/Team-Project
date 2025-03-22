@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/deals.css') }}">
@endsection

@section('title')
<title>Deals | GAMERHUB</title>
@endsection

@section('content')
<!-- BLACK FRIDAY DEALS -->

<div class="products">
    <div class="container">
        <h1 class="lg-title">Deals of the Moment</h1>
        <p class="text-light">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
            quos sit consectetur, ipsa voluptatem vitae necessitatibus dicta
            veniam, optio, possimus assumenda laudantium. Temporibus, quis cum.
        </p>
        <div class="product-items">
            <div class="product-items">
                <section class="catalogue">
                    <div class="product-items">
                        <!-- single product -->
                        <div class="product">
                            <div class="product-content">
                                <div class="product-img">
                                    <img src="image/image-1.png" alt="product image" />
                                </div>
                                <div class="product-btns">
                                    <button type="button" class="btn-cart">
                                        add to cart
                                        <span><i class="fas fa-plus"></i></span>
                                    </button>
                                    <button type="button" class="btn-buy">
                                        buy now
                                        <span><i class="fas fa-shopping-cart"></i></span>
                                    </button>
                                </div>
                            </div>

                            <div class="product-info">
                                <a href="#" class="product-name">Lorem ipsum dolor sit amet, consectetur</a>
                                <p class="product-price">$ 150.00</p>
                                <p class="product-price">$ 133.00</p>
                            </div>

                            <div class="off-info">
                                <h2 class="sm-title">25% off</h2>
                            </div>
                        </div>
                        <!-- end of single product -->
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection