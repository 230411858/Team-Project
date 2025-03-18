<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FONTS ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ url('/css/reuse.css') }}">
    <link rel="stylesheet" href="{{ url('/css/swiper-bundle.min.css') }}">
    <style>
        /*container*/
        .search-container {
            margin: 25px 0 0 20px;
            text-align: center;

        }

        /*  form */
        #search {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        /* input */
        .search-input {
            padding: 10px;
            font-size: 16px;
            border: none;
            outline: none;
            max-width: 150px;

        }

        /* button */
        .search-button {
            background-color: #ef5e41;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /*darker colour*/
        .search-button:hover {
            background-color: #d24a37;
        }
    </style>

    @yield('css')

    @yield('title')
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="{{ url('/') }}" class="nav__logo">
                    <img src="{{ url('/images/logo.png') }}" width="300px" height="84.6667px">
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__toggle-menu"></i>
                    <i class="ri-close-line nav__toggle-close"></i>
                </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li>
                        <a href="{{ url('/') }}" class="nav__link">Home</a>
                    </li>

                    <!--=============== DROPDOWN 1 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Products <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-mouse-line"></i>
                                    </div>

                                    <a href="{{ url('/products/category/mice') }}" class="dropdown__title">Mouse</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Wireless</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Wired</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Ergonomic</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Stylus</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Gaming</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-keyboard-box-line"></i>
                                    </div>

                                    <a href="{{ url('/products/category/keyboards') }}" class="dropdown__title">Keyboards</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Mechanical</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Membrane</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-computer-line"></i>
                                    </div>

                                    <a href="{{ url('/products/category/monitors') }}" class="dropdown__title">Monitors</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">144Hz</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">240Hz</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-headphone-line"></i>
                                    </div>

                                    <a href="{{ url('/products/category/audio') }}" class="dropdown__title">Audio</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Headphones</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Speakers</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!--=============== DROPDOWN 2 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Deals <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-money-pound-circle-line"></i>
                                    </div>
                                    <a href="{{ url('/deals') }}" class="dropdown__title">Discounts</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="{{ url('/deals') }}" class="dropdown__link">Discounted items</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--=============== DROPDOWN 3 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Support <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-customer-service-line"></i>
                                    </div>
                                    <a href="{{ url('/support') }}" class="dropdown__title">Support</a>
                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="{{ url('/contact') }}" class="dropdown__link">Contact</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/faq') }}" class="dropdown__link">FAQ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--=============== About ===============-->
                    <li>
                        <a href="{{ url('/about') }}" class="nav__link">About</a>
                    </li>

                    <!--=============== Search ===============-->
                    <li>
                        <div class="search-container">
                            <form id="search" action="{{ route('search') }}" method="GET">
                                <input type="text" name="query" class="search-input" placeholder="Search..." required>
                                <button type="submit" class="search-button">
                                    <i class="ri-search-line"></i>
                                </button>
                            </form>
                        </div>
                    </li>

                    <!--=============== Switch ===============-->
                    <li>
                        <button id="switch">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.3807 2.01886C9.91573 3.38768 9 5.3369 9 7.49999C9 11.6421 12.3579 15 16.5 15C18.6631 15 20.6123 14.0843 21.9811 12.6193C21.6613 17.8537 17.3149 22 12 22C6.47715 22 2 17.5228 2 12C2 6.68514 6.14629 2.33869 11.3807 2.01886Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z"></path>
                            </svg>
                        </button>
                    </li>

                    <!--=============== Login ===============-->
                    <li>
                        <div class="login">
                            <a href="{{ url('/login') }}"><i class="ri-user-line"></i></a>
                        </div>
                    </li>

                    <!--=============== Basket ===============-->
                    <li>
                        <div class="basket-container">
                            <div class="nav_basket">
                                @php
                                $basket_count = 0;
                                $total = 0;
                                if (Auth::check())
                                {
                                $basket_items = \App\Models\BasketItem::where('user', Auth::id())->get();
                                $products = \App\Models\Product::all();
                                foreach ($basket_items as $basket_item)
                                {
                                $basket_count = $basket_count + $basket_item->quantity;
                                $total = $total + ($products->firstWhere('id', $basket_item->product)->price * $basket_item->quantity);
                                }
                                $total = $total / 100;
                                }
                                @endphp
                                <i class="ri-shopping-cart-line"></i>
                                <span class="basket-count">{{ $basket_count }}</span>
                            </div>
                            <div class="basket-modal" id="basket-modal">
                                <div class="basket-content">
                                    <h2 href="test">Your Basket</h2>
                                    <ul class="basket-items">
                                        @php
                                        $basket_items = \App\Models\BasketItem::where('user', Auth::id())->get();
                                        $products = \App\Models\Product::all();
                                        $images = \App\Models\ProductImage::all();
                                        @endphp
                                        @foreach ($basket_items as $basket_item)
                                        @php

                                        $product = $products->firstWhere('id', $basket_item->product);

                                        $image = $images->firstWhere('product', $product->id);

                                        $file = 'cover.png';

                                        if ($image != null)
                                        {
                                        $file = $image->file;
                                        }
                                        @endphp
                                        <li>
                                            <img height="60px" width="80px" src="{{ url('/images') }}/{{ $product->category }}/{{ $file }}" alt="">
                                            <p class="nav__link">{{ $product->name }}</p>
                                            <p class="nav__link">x{{ $basket_item->quantity }}</p>
                                            @if($basket_item->quantity < 100)
                                                <form action="{{ url('/add') }}" method="POST">
                                                @csrf
                                                <input hidden type="number" name="product" value="{{ $product->id }}">
                                                <input hidden type="number" id="quantity" name="quantity" value="1">
                                                <button id="increase-quantity" class="quantity-btn" type="submit">+</button>
                                                </form>
                                                @endif
                                                @if($basket_item->quantity > 1)
                                                <form action="{{ url('/add') }}" method="POST">
                                                    @csrf
                                                    <input hidden type="number" name="product" value="{{ $product->id }}">
                                                    <input hidden type="number" id="quantity" name="quantity" value="-1">
                                                    <button id="decrease-quantity" class="quantity-btn" type="submit">-</button>
                                                </form>
                                                @endif
                                                <form action="{{ url('/remove') }}" method="POST">
                                                    @csrf
                                                    <input hidden name="id" value="{{ $basket_item->id }}">
                                                    <input hidden name="user" value="{{ $basket_item->user }}">
                                                    <button id="remove_from_cart" class="ri-close-circle-line" aria-label="Remove from Cart" type="submit" value="Remove from Cart"></button>
                                                </form>
                                        </li>
                                        <li>
                                        <span class="total-price">£{{ number_format(($product->price * $basket_item->quantity) / 100, 2) }} &nbsp </span> | £{{ number_format($product->price / 100, 2) }}/item
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="basket-total">
                                        <span>Total:</span>
                                        <span class="total-price">£{{ number_format($total, 2) }}</span>
                                    </div>
                                    <a href="{{ url('/checkout') }}" class="checkout-btn">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>