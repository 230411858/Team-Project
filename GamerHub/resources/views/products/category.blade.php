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
                <div id ="pagebody-top">
                    <div id="productwrapper">
                        <div id="textsection">
                            <h2>{{ ucfirst($category) }}</h2>  
                            <p>Traverse through top of the range {{ $category }}</p>
                        </div>
                        <div id="imagesection">
                            <img src="ProductImages/Mice/Mice(Cover).png" alt="Wireless Black Mouse">
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
                <div class="filtersection">
                    <h3>Filters</h3>

                    <ul>
                        <li><input type="checkbox"> Wireless</li>
                        <li><input type="checkbox"> Wired</li>
                        <li><input type="checkbox"> Ergonomic</li>
                        <li><input type="checkbox"> Gaming</li>
                        <li><input type="checkbox"> Stylus</li>
                    </ul>

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
                    <div class="products">
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
                        <a href="#" class="cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                @endforeach
            
        </section>
        <script src="https://kit.fontawesome.com/6d6a721856.js" crossorigin="anonymous"></script>
        @endsection