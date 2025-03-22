@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/front.css') }}">
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
            <button id="hero_button">Discover our Offers</button>
          </div>
        </div>
      </div>
      </section>
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
            if ($image == null)
            {
            $file = 'cover.png';
            }
            else
            {
            $file = $image->file;
            }
          @endphp
          <div class="item">
            <div class="product">
              <div class="product-content">
                <div class="product-img">
                  <img src="{{ url('/images') }}/{{ $discount_item->category }}/{{ $file }}" alt="Discounted Item Product Image" />
                </div>
                <div class="product-btns">
                  <a href="{{ url('/add') }}/{{ $discount_item->id }}"><button type="button" class="btn-cart">add to cart></button></a>
                  <a href="{{ url('products') }}/{{ $discount_item->id }}"><button type="button" class="btn-buy">more info</button></a>
                </div>
              </div>
  
              <div class="product-info">
                <a href="#" class="product-name"
                  >{{ ucwords($discount_item->name) }}</a
                >
                <p class="product-price">£{{ number_format(($discount_item->price / 100), 2) }}</p>
                <p class="product-price">£{{ number_format(($discount_item->price / 100) * (1 - $discount_item->discount), 2) }}</p>
              </div>
  
              <div class="off-info">
                <h2 class="sm-title">{{ $discount_item->discount * 100 }}% off</h2>
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
                <a href="#"><i class='bx bxs-package'></i></a>
            </div>
            <a><b>Free shipping</b> around all of UK</a>
        </div>
        <div class="reason-content">
            <div class="icones">
                <a href="#"><i class='bx bx-check-shield' ></i></a>
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
    <section class="layout">
      <div class="feed">
        <div class="type_card">
            <p class="type_card__category">Monitors</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Headset</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Stereo</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Mechanical Keyboard</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Wired Mouse</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Microphone</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Wireless Mouse</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Membrane Keyboard</p>
            <p class="type_card__title">Little description</p>
        </div>
        <div class="type_card">
            <p class="type_card__category">Ergonomic Mouse</p>
            <p class="type_card__title">Little description</p>
        </div>
     </div>
    </section>
    @endsection
