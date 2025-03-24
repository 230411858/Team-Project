@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/deals.css') }}" />
@endsection

@section('title')
<title>Deals | GAMERHUB</title>
@endsection

@section('content')
<div class="cart">
    <h2 class="cart-title">Your Cart</h2>
    <div class="cart-content"></div>
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">$0</div>
    </div>
    <button class="cart_btn-buy">more info</button>
    <i class="ri-close-line" id="cart-close"></i>
</div>
<section id="countdown" class="countdown">
    <div class="countdown_background">
        <div class="countdown_container">
            @php
            $biggest_discount = $discount_items->sortByDesc('discount')->first();

            $biggest_discount_image = $images->firstWhere('product', $biggest_discount->id);
            
            @endphp
            <img src="{{ url('/images') }}/{{ $biggest_discount->category }}/{{ $biggest_discount_image == null ? 'cover.png' : $biggest_discount_image->file }}" alt="" />
            <div class="countdown-text">
                <h1><b>{{ $biggest_discount->discount * 100 }}% off</b></h1>
                <p class="product-price">£{{ number_format($biggest_discount->price / 100, 2) }}</p>
                <p class="product-price">£{{ number_format(($biggest_discount->price * (1 - $biggest_discount->discount)) / 100, 2) }}</p>
                <h2><b>Limited Deal: <br> Don't miss out!</b></h2>
                <div class="countdown_time">
                    <div>
                        <p id="days">00</p>
                        <span>Days</span>
                    </div>
                    <div>
                        <p id="hours">00</p>
                        <span>Hours</span>
                    </div>
                    <div>
                        <p id="minutes">00</p>
                        <span>Minutes</span>
                    </div>
                    <div>
                        <p id="seconds">00</p>
                        <span>Seconds</span>
                    </div>
                </div>
                <button type="button" class="btn-cart">
                    add to cart
                    <span><i class="fas fa-plus"></i></span>
                </button>
            </div>
        </div>
    </div>
</section>
<section id="catalogue" class="catalogue">
    <div class="products">
        <div class="container">
            <h1 class="cata-title">DEALS OF THE MOMENT</h1>

            <div class="product-items">
                @foreach ($discount_items as $discount_item)
                <!-- single product -->
                <div class="product">
                    <div class="product-content">
                        <div class="product-img">
                            @php
                            $image = $images->firstWhere('product', $discount_item->id);
                            @endphp
                            <a href="{{ url('/products') }}/{{ $discount_item->id }}">
                                <img src="{{ url('/images') }}/{{ $discount_item->category }}/{{ $image == null ? 'cover.png' : $image->file }}" alt="Product Image" />
                            </a>
                        </div>
                        <div class="product-btns">
                            <button type="button" class="btn-cart">
                                add to cart
                                <span><i class="fas fa-plus"></i></span>
                            </button>
                            <button type="button" class="btn-buy">
                                more info
                            </button>
                        </div>
                    </div>

                    <div class="product-info">
                        <a href="{{ url('/products') }}/{{ $discount_item->id }}" class="product-name">{{ $discount_item->name }}</a>
                        <p class="product-price">£{{ number_format($discount_item->price / 100, 2) }}</p>
                        <p class="product-price">£{{ number_format(($discount_item->price * (1 - $discount_item->discount))/ 100, 2) }}</p>
                    </div>

                    <div class="off-info">
                        <h2 class="sm-title">{{ $discount_item->discount * 100 }}% off</h2>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ url('/js/deals.js') }}"></script>
@endsection