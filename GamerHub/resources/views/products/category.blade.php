@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/category.css') }}">
@endsection

@section('title')
<title>{{ ucfirst($category) }} | GAMERHUB</title>
@endsection

@section('content')
<!-----MAIN BODY----->
<section id="pagebody">
    <!--TOP SECTION-->
    <div id="pagebody-top">
        <div id="productwrapper">
            <div id="textsection">
                <h2>{{ ucfirst($category) }}</h2>
                <p>Traverse through top of the range {{ $category }}</p>
            </div>
            <div id="imagesection">
                <img src="{{ url('/images') }}/{{ $category }}/cover.png" alt="Wireless Black Mouse">
            </div>
        </div>

    </div>
    <!---BOTTOM SECTION--->
    <div id="pagebody-bottom">
        <div id="bottombanner">
            <p>EXCLUSIVE DISCOUNT TO NEW USERS</p>
            <button id="signup-button">SIGN UP NOW</button>
        </div>
    </div>
</section>

<section id="productsmice">
    <div class="page-layout">
        <!-- Filter Section -->
        @switch($category)

        @case('mice')
        <div class="filtersection">
            <h3>Filters</h3>
            <button class="active" data-name="all">Show all</button>
            <button data-name="wireless">Wireless</button>
            <button data-name="wired">Wired</button>
            <button data-name="ergonomic">Ergonomic</button>
            <button data-name="stylus">Stylus</button>
            <button data-name="gaming">Gaming</button>
        </div>
        @break
        @case('keyboards')
        <div class="filtersection">
            <h3>Filters</h3>
            <button class="active" data-name="all">Show all</button>
            <button data-name="membrane">Membrane</button>
            <button data-name="mechanical">Mechanical</button>
        </div>
        @break
        @case('monitors')
        <div class="filtersection">
            <h3>Filters</h3>
            <button class="active" data-name="all">Show all</button>
            <button data-name="144hz">144hz</button>
            <button data-name="240hz">240hz</button>
        </div>
        @break
        @case('audio')
        <div class="filtersection">
            <h3>Filters</h3>
            <button class="active" data-name="all">Show all</button>
            <button data-name="wireless">Wireless</button>
            <button data-name="wired">Wired</button>
        </div>
        @break
        @default
        <div class="filtersection">
            <h3>Filters</h3>
            <button class="active" data-name="all">Not applicable</button>
        </div>
        @endswitch

        <div class="productcontainer">

            @foreach ($products as $product)
            @php
            $image = $images->firstWhere('product', $product->id);
            if ($image == null)
            {
            $file = 'cover.png';
            }
            else
            {
            $file = $image->file;
            }
            @endphp

            <div class="products" data-name="{{ $product->sub_category }}">
                <a href="{{ url('/products') }}/{{ $product->id }}">
                    <img src="{{ url('/images') }}/{{ $category }}/{{ $file }}">
                </a>
                <h5>{{ $product->name }}</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>£{{ $product->price / 100 }}</h4>
                <a href="{{ url('/basket/add') }}" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</section>
<script src="{{ url('/js/category.js') }}"></script>
@endsection