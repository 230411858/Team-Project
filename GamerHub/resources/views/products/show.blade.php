@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/product.css') }}">
@endsection

@section('title')
<title>{{ $product->name }} | GAMERHUB</title>
@endsection

@section('content')
<nav>
    <ul class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/') }}/{{ $product->category }}">{{ ucfirst($product->category) }}</a></li>
        <li>{{ $product->name }}</li>
    </ul>
</nav>

<!-- Products part -->
<h1 class="name-p">{{ $product->name }}</h1>

<div class="page-p container">


    <div class="main-p">

        <div class="images-p">

            <!-- main picture (big one) -->
            @php
            $image = $images->firstWhere('product', $product->id);

            $file = 'cover.png';

            if ($image != null)
            {
            $file = $image->file;
            }
            @endphp
            <div class="image-main-p">
                <img src="{{ url('/images') }}/{{ $product->category }}/{{ $file }}" alt="Product Image" id="Mainpicture">
            </div>

            <!-- little thumbnails to click to change pics-->
            <div class="thumbnails">
                @foreach ($images as $image)
                @php
                $file = "$product->category/$image->file"
                @endphp
                <img src="{{ url('/images') }}/{{ $file }}" alt="thumbnail1" onclick="changeImage('{{ url('/') }}/images/{{ $file }}')">
                @endforeach
            </div>
        </div>

        <div class="details-p">
            <p class="description-p">
                {{ $product->description }}
            </p>
            <p class="price-p">Price: £<span id="price">{{ $product->price / 100 }}</span></p>
            <div class="quantity-section">
                <form action="{{ url('/add') }}" method="POST">
                    @csrf
                    <label for="quantity">Quantity:</label>
                    <input hidden type="number" name="product" value="{{ $product->id }}">
                    <input type="number" id="quantity" name="quantity" value="1" min="1" onchange="updateTotal()">
                    £<span id="total">{{ number_format($product->price / 100, 2) }}</span>
                    <button class="cart-butt" aria-label="Add to Cart" type="submit" value="Add to Cart">Add to Cart</button>
                </form>
            </div>

            <!-- description on the right -->
            <div class="extra-info">
                <div class="info-section">
                    <h3>Free Shipping and Returns</h3>
                    <p>Experience peak comfort and performance with our wireless mouse...</p>
                    <!-- add to cart button -->
                </div>

                <br>


                <div class="specs-main">
                    <button type="button" class="spec-det">Specs & Details</button>
                    <div class="specstable">
                        <ul>
                            <li>Height: 132.5 mm</li>
                            <li>Width: 99.8 mm</li>
                            <li>Depth: 51.4 mm</li>
                            <li>Weight: 164 g</li>
                        </ul>
                    </div>
                    <!-- spec button -->
                    <br> <br>
                </div>
                <div class="compat-main">
                    <button type="button" class="compat-js">Compatibility</button>
                    <div class="compat">
                        <br>
                        <ul>
                            <li>Windows 10 or later</li>
                            <li>macOS 12 or later</li>
                            <li>Linux</li>
                        </ul>
                        <!-- compatibility button -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- full container for right side -->

<div class="reviews-section container">
    <h2>Customer Reviews</h2>

    <div class="review-form">
        <h3>Write a Review</h3>
        <form action="{{ url('/review')}}/{{ $product->id }}" method="POST">
            @csrf
            <input type="text" maxlength="1000" id="review-text" name="review-text" rows="4" placeholder="Write your review here...">
            <button type="submit">Submit Review</button>
        </form>
    </div>

    <div class="reviews-list" id="reviews-list">
        @if ($reviews->isEmpty())
        <p id="no-reviews-message">No reviews yet. Please leave a review</p>
        @else
        @foreach ($reviews as $review)
        <div class="review-item">
            <strong>{{ \App\Models\User::find($review->user)->name }}</strong>
            <p>{{ $review->text }}</p>
        </div>
        @endforeach
        @endif
    </div>
</div>
<!-- reviews section -->
<script src="{{ url('/js/product.js') }}"></script>
@endsection