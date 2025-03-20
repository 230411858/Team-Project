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
                <button id="signup-button" onclick="location.href='/Front_Page1/login and sign up/login and sign up.html'">
                    SIGN UP NOW
                </button>
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
                <button data-price="1000-1999">£10 - £20</button>
                <button data-price="2000-3999">£20 - £40</button>
                <button data-price="40000-5999">£40 - £60</button>
                <button data-price="6000-7999">£60 - £80</button>
                <button data-price="8000+">£80+</button>
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
            <div class="products" data-name="{{ $product->name }}" data-price="{{ number_format((($product->price * (1 - $product->discount)) / 100), 2) }}">
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
                <h4>£{{ number_format((($product->price * (1 - $product->discount)) / 100), 2) }}</h4>
                @else
                <h4>£{{ number_format($product->price / 100) }}</h4>
                @endif
                <a href="#" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            @endforeach
            <div class="products" data-name="wireless" data-price="13.99">
                <a href="mouse.html">
                    <img src="ProductImages/Mice/M171 Wireless Mouse.webp">
                </a>
                <h5>M171 Wireless Mouse</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>£13.99</h4>
                <a href="#" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            <div class="products" data-name="wired" data-price="35.99">
                <img src="ProductImages/Mice/WiredMouse(1).png">
                <h5>Wired Mouse</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>£35.99</h4>
                <a href="#" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            <div class="products" data-name="ergonomic" data-price="33.99">
                <img src="ProductImages/Mice/ErgonomicMice(1).png">
                <h5>Ergonomic Mouse</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>£33.99</h4>
                <a href="#" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            <div class="products" data-name="stylus" data-price="48.99">
                <img src="ProductImages/Mice/StylusPen(1).png">
                <h5>Stylus Mouse</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>£48.99</h4>
                <a href="#" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            <div class="products" data-name="gaming" data-price="40.99">
                <img src="ProductImages/Mice/GamingMice(1).png">
                <h5>Gaming Mouse</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>£40.99</h4>
                <a href="#" class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>

        </div>

        <!-- <div class="productcontainer">
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
                <h4>£{{ number_format($product->price / 100, 2) }}</h4>
                <form action="{{ url('/add') }}" method="POST">
                    @csrf
                    <input hidden type="number" name="product" value="{{ $product->id }}">
                    <input hidden name="quantity" value="1">
                    <button class="cart ri-shopping-cart-line" aria-label="Add to Cart" type="submit" value="Add to Cart"></button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</section> -->

</section>
<script src="{{ url('/js/category.js') }}"></script>
@endsection