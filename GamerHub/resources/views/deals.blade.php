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
                        @foreach ($discount_items as $discount_item)
                        <!-- single product -->
                        <div class="product">
                            <div class="product-content">
                                <div class="product-img">
                                    @php
                                    $image = $images->firstWhere('product', $discount_item->id);

                                    if ($image == null)
                                    {
                                        $file = "cover.png";
                                    }
                                    else
                                    {
                                        $file = $image->file;
                                    }
                                    @endphp
                                    <a href="{{ url('/products') }}/{{ $discount_item->id }}">
                                    <img src="{{ url('/images') }}/{{ $discount_item->category }}/{{ $file }}" alt="Product Image" />
                                    </a>
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
                                <a href="{{ url('/products') }}/{{ $discount_item->id }}" class="product-name">{{ $discount_item->name }}</a>
                                <p class="product-price">£{{ number_format($discount_item->price / 100, 2) }}</p>
                                <p class="product-price">£{{ number_format(($discount_item->price * (1 - $discount_item->discount))/ 100, 2) }}</p>
                            </div>

                            <div class="off-info">
                                <h2 class="sm-title">{{ $discount_item->discount * 100 }}% off</h2>
                            </div>
                        </div>
                        <!-- end of single product -->
                         @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('/js/deals.js') }}"></script>