@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/front.css') }}">
@endsection

@section('title')
<title>Browse | GAMERHUB</title>
@endsection

@section('content')
<section id="hero">
    <div class="hero-section">
        <div class="hero-content">
            <h1><b>The way to <span>compete</span> with excellence</b></h1>
            <button>Discover our Offers</button>
        </div>
    </div>
</section>

<!--=============== REASONS TO BUY ==========-->

<section class="reason">
    <div class="reason-content">
        <p><b>Buying on GamerHub has its loads of perks</b></p>
    </div>

    <div class="reason-content">
        <div class="icones">
            <a href="#"><i class='bx bxs-package'></i></a>
        </div>
        <a><b>Free shipping</b> within UK mainland</a>
    </div>
    <div class="reason-content">
        <div class="icones">
            <a href="#"><i class='bx bx-check-shield'></i></a>
        </div>
        <a><b>Extended warranty</b> with <b>30 days refunded</b> warranty.</a>
    </div>

    <div class="reason-content">
        <div class="icones">
            <a href="#"><i class='bx bx-credit-card'></i></a>
        </div>
        <a><b>Pay in three times</b> with <b>no additional cost</b></a>
    </div>
</section>

<!--=============== PRODUCT ===============-->

<section class="section products">
    <div class="container">

        <h2 class="h2 section-title">Different Products</h2>

        <ul class="product-list">

            @foreach ($products as $product)
            <li class="w-50">
                <a href="{{ url('/products') }}/{{ $product->id }}" class="product-card">

                    <figure class="card-banner">
                        @php
                        $image = $images->firstWhere('product', $product->id);
                        if ($image != null)
                        {
                        $file = $image->file;
                        }
                        else
                        {
                        $file = "cover.png";
                        }
                        @endphp
                        <img src="{{ url('/images') }}/{{ $product->category }}/{{ $file }}" class="img-cover">
                    </figure>

                    <div class="card-content">

                        <h3 class="h3 card-title">{{ $product->name }}</h3>
                    </div>

                </a>
            </li>
            @endforeach

        </ul>

    </div>
</section>
@endsection