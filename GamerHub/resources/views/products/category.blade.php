@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/category.css') }}">
@endsection

@section('title')
<title>{{ ucfirst($category) }} | GAMERHUB</title>
@endsection

@section('content')
<!-----MAIN BODY implemented by Isa Abdur-Rahman line ------>
<section id="pagebody">
    <div id="pagebody-top">
        <div id="productwrapper">
            <div id="textsection">
                <h2>{{ ucfirst($category) }}</h2>
                <p>Traverse through the top of the range {{ $category }}, making navigation easy</p>
                @if (!Auth::check())
                <button id="signup-button" onclick="location.href='/register'">
                    SIGN UP NOW
                </button>
                @endif
            </div>
            <div id="imagesection">
                <img src="{{ url('/images') }}/{{ $category }}/cover.png" alt="Wireless Black Mouse">
            </div>
        </div>
    </div>
</section>

<section id="productsmice">
    <div class="page-layout">
        <div class="filtersection">
            @switch ($category)

            @case ('mice')
            <div class="category">
                <h3>Category</h3>
                <button class="active" data-name="all">Show all</button>
                <button data-name="wireless">Wireless</button>
                <button data-name="wired">Wired</button>
                <button data-name="ergonomic">Ergonomic</button>
                <button data-name="stylus">Stylus</button>
                <button data-name="gaming">Gaming</button>
            </div>
            @break
            @case ('keyboards')
            <div class="category">
                <h3>Category</h3>
                <button class="active" data-name="all">Show all</button>
                <button data-name="membrane">Membrane</button>
                <button data-name="mechanical">Mechanical</button>
            </div>
            @break
            @case ('monitors')
            <div class="category">
                <h3>Category</h3>
                <button class="active" data-name="all">Show all</button>
                <button data-name="144hz">144hz</button>
                <button data-name="240hz">240hz</button>
            </div>
            @break
            @case ('audio')
            <div class="category">
                <h3>Category</h3>
                <button class="active" data-name="all">Show all</button>
                <button data-name="wired">Wired</button>
                <button data-name="wireless">Wireless</button>
            </div>
            @break
            @default
            <div class="category">
                <h3>Category</h3>
                <button class="active" data-name="all">Show all</button>
                <button data-name="no-category">No category defined!</button>
            </div>
            @break
            @endswitch
            <div class="price">
                <h3>Price</h3>
                <button class="active" data-price="all">Show all</button>
                <button data-price="10.00-19.99">£10 - £20</button>
                <button data-price="20.00-39.99">£20 - £40</button>
                <button data-price="40.00-59.99">£40 - £60</button>
                <button data-price="60.00-79.99">£60 - £80</button>
                <button data-price="80.00-">£80+</button>
            </div>
        </div>

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
            <div class="products" data-name="{{ $product->sub_category }}" data-price="{{ number_format((($product->price * (1 - $product->discount)) / 100), 2) }}">
                <a href="{{ url('/products') }}/{{ $product->id }}">
                    <img src="{{ url('/images') }}/{{ $category }}/{{ $file }}">
                </a>
                <h5>{{ ucwords($product->name) }}</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                @if ($product->discount > 0)
                <h4 class="discount-price">£{{ number_format((($product->price * (1 - $product->discount)) / 100), 2) }}</h4>
                @else
                <h4>£{{ number_format(($product->price / 100), 2) }}</h4>
                @endif
                <a href="{{ url('/add') }}/{{ $product->id }}" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            @endforeach
        </div>
</section>
@endsection
@section('js')
<script src="{{ url('/js/category.js') }}"></script>
<script src="https://kit.fontawesome.com/6d6a721856.js" crossorigin="anonymous"></script>
<script async>
    document.addEventListener("DOMContentLoaded", function() {
        subCategory = "<?php echo $sub_category ?>";
        document.querySelector(`[data-name="${subCategory}"]`).click();
    });
</script>
@endsection