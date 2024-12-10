@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/deals.css') }}">
@endsection

@section('title')
<title>Deals | GAMERHUB</title>
@endsection

@section('content')
    <!-- BLACK FRIDAY DEALS -->

    <section class="slider">
        <div class = "slider">
            <div class = "container">
                <h1 class = "lg-title">Get ready for the ultimate extravaganza this <span style="color: gold;">Black Friday!</span></h1>
                <p class = "text-light">Discover jaw-dropping discounts on our premium gaming accessories, from headsets to microphones, keyboards, and more.</p>

                @foreach ($discount_items as $discount_item)
                <div class = "product-items">
                    <!-- single product -->
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "{{ url('/images') }}/{{ $discount_item->category }}/{{ \App\Http\Controllers\ProductController::getCoverImage($discount_item->id) }}" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <button type = "button" class = "btn-cart"> add to cart
                                    <span><i class = "fas fa-plus"></i></span>
                                </button>
                                <button type = "button" class = "btn-buy"> buy now
                                    <span><i class = "fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "sm-title">review</h2>
                                <div class = "rating">
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                </div>
                            </div>
                            <a href = "#" class = "product-name">{{ $discount_item->name }}</a>
                            <p class = "product-price">£{{ number_format($discount_item->price / 100, 2) }}</p>
                            <p class = "product-price">£{{ number_format($discount_item->price / 100 - ($discount_item->price / 100 * $discount_item->discount), 2) }}</p>
                        </div>

                        <div class = "off-info">
                            <h2 class = "sm-title">{{ $discount_item->discount * 100 }} off</h2>
                        </div>
                    </div>
                    <!-- end of single product -->
                     @endforeach    
                </div>
            </div>
        </div>
    </section> 
@endsection