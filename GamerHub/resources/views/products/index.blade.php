@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/front.css') }}">
<style>
  .unclickable {
    pointer-events: none;
  }
</style>
@endsection

@section('title')
<title>Welcome | GamerHub</title>
@endsection

@section('content')
<section class="hero">
  <div class="hero_background">
    <div class="hero_container">
      <img src="{{ url('/images/hero_image.png') }}" alt="">
      <div class="hero-text">
        <h1><b>The way to <span>compete</span> with excellence</b></h1>
        <a href="{{ url('/deals') }}"><button id="hero_button">Discover our Offers</button></a>
      </div>
    </div>
  </div>
</section>
<h1 class="lg-title">Our best sellers</h1>
<section class="slider">
  <input type="radio" name="position" checked />
  <input type="radio" name="position" />
  <input type="radio" name="position" />
  <input type="radio" name="position" />
  <input type="radio" name="position" />
  <input type="radio" name="position" />
  <main id="carousel">
    @foreach ($discount_items as $discount_item)
    @php
    $image = $images->firstWhere('product', $discount_item->id);
    @endphp
    <div class="item">
      <div class="product">
        <div class="product-content">
          <div class="product-img">
            <a href="{{ url('/products') }}/{{ $discount_item->id }}">
            <img src="{{ url('/images') }}/{{ $discount_item->category }}/{{ $image == null ? 'cover.png' : $image->file }}" alt="product image" />
            </a>
          </div>
          <div class="product-btns">
            <a href="{{ url('/add') }}/{{ $discount_item->id }}"><button type="button" class="btn-cart">add to cart></button></a>
            <button onclick="window.location.href = '/products/<?php echo $discount_item->id ?>'" type="button" class="btn-buy">more info</button>
          </div>
        </div>

        <div class="product-info">
          <a href="{{ url('/products') }}/{{ $discount_item->id }}" class="product-name">{{ $discount_item->name }}</a>
          <p class="product-price">£{{ $discount_item->price / 100 }}</p>
          <p class="product-price">£{{ number_format(($discount_item->price * (1 - $discount_item->discount)) / 100, 2) }}</p>
        </div>

        <div class="off-info">
          <h2 class="sm-title">{{ $discount_item->discount * 100}}% off</h2>
        </div>
      </div>
    </div>
    @endforeach
  </main>
</section>
<section class="reason">
  <div class="reason-content">
    <p><b>Buying on GamerHub has loads of perks</b></p>
  </div>
  <div class="reason-content">
    <div class="icones">
      <a class="unclickable" href="#"><i class='bx bxs-package'></i></a>
    </div>
    <a class="unclickable"><b>Fast shipping</b> across the UK</a>
  </div>
  <div class="reason-content">
    <div class="icones">
      <a class="unclickable" href="#"><i class='bx bx-check-shield'></i></a>
    </div>
    <a class="unclickable"><b>Extended warranty</b> with <b>a 30 day</b> money back guarantee.</a>
  </div>

  <div class="reason-content">
    <div class="icones">
      <a class="unclickable" href="#"><i class='bx bx-credit-card'></i></a>
    </div>
    <a class="unclickable"><b>Pay in three</b> with <b>no interest</b></a>
  </div>
</section>
<section class="layout">
  <h1 class="cata-title"><b>CATALOGUE</b></h1>
  <div class="feed">
    <a href="{{ url('/products/category/monitors') }}" class="type_card">
      <p class="type_card__title">Monitors</p>
    </a>
    <a href="{{ url('/products/category/speakers') }}" class="type_card">
      <p class="type_card__title">Speakers</p>
    </a>
    <a href="{{ url('/products/category/mice') }}" class="type_card">
      <p class="type_card__title">Mice</p>
    </a>
    <a href="{{ url('/deals') }}" class="type_card">
      <p class="type_card__title">Discounted</p>
    </a>
    <a href="{{ url('/products/category/keyboards') }}" class="type_card">
      <p class="type_card__title">Keyboards</p>
    </a>
    <a href="{{ url('/products/category/microphones') }}" class="type_card">
      <p class="type_card__title">Microphones</p>
    </a>
</section>
@endsection