<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--=============== REMIXICONS ===============-->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="{{ url('/css/headerfooter.css') }}" />
  <link rel="stylesheet" href="swiper-bundle.min.css">
  @yield('css')

  @yield('title')
</head>

<body>
  <!--=============== HEADER ===============-->
  <header class="header">
    <nav class="nav container">
      <div class="nav__data">
        <a href="{{ url('/') }}" class="nav__logo">
          <img src="{{ url('/images/logo.png') }}" alt="GamerHub Logo" />
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
                  <a href="{{ url('/products/category/mice') }}">
                    <span class="dropdown__title">Mice</span>
                  </a>
                  <ul class="dropdown__list">
                    <li>
                      <a href="{{ url('/products/category/mice/wireless') }}" class="dropdown__link">Wireless</a>
                    </li>
                    <li>
                      <a href="{{ url('/products/category/mice/wired') }}" class="dropdown__link">Wired</a>
                    </li>
                    <li>
                      <a href="{{ url('/products/category/mice/ergonomic') }}" class="dropdown__link">Ergonomic</a>
                    </li>
                    <li>
                      <a href="{{ url('/products/category/mice/stylus') }}" class="dropdown__link">Stylus</a>
                    </li>
                    <li>
                      <a href="{{ url('/products/category/mice/gaming') }}" class="dropdown__link">Gaming</a>
                    </li>
                  </ul>
                </div>

                <div class="dropdown__group">
                  <div class="dropdown__icon">
                    <i class="ri-keyboard-box-line"></i>
                  </div>

                  <a href="{{ url('/products/category/keyboards') }}">
                    <span class="dropdown__title">Keyboards</span>
                  </a>

                  <ul class="dropdown__list">
                    <li>
                      <a href="{{ url('/products/category/keyboards/mechanical') }}" class="dropdown__link">Mechanical</a>
                    </li>
                    <li>
                      <a href="{{ url('/products/category/keyboards/membrane') }}" class="dropdown__link">Membrane</a>
                    </li>
                  </ul>
                </div>

                <div class="dropdown__group">
                  <div class="dropdown__icon">
                    <i class="ri-computer-line"></i>
                  </div>

                  <a href="{{ url('/products/category/monitors') }}">
                    <span class="dropdown__title">Monitors</span>
                  </a>

                  <ul class="dropdown__list">
                    <li>
                      <a href="{{ url('/products/category/monitors/144hz') }}" class="dropdown__link">144hz</a>
                    </li>
                    <li>
                      <a href="{{ url('/products/category/monitors/240hz') }}" class="dropdown__link">240hz</a>
                    </li>
                  </ul>
                </div>

                <div class="dropdown__group">
                  <div class="dropdown__icon">
                    <i class="ri-headphone-line"></i>
                  </div>

                  <a href="{{ url('/products/category/audio') }}">
                    <span class="dropdown__title">Audio</span>
                  </a>

                  <ul class="dropdown__list">
                    <li>
                      <a href="{{ url('/products/category/audio/wired') }}" class="dropdown__link">Wired</a>
                    </li>
                    <li>
                      <a href="{{ url('/products/category/audio/wireless') }}" class="dropdown__link">Wireless</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li>
            <a href="{{ url('/deals') }}" class="nav__link">Deals</a>
          </li>

          <!--=============== DROPDOWN 2 ===============-->
          <li class="dropdown__item">
            <div class="nav__link dropdown__button">
              Support<i class="ri-arrow-down-s-line dropdown__arrow"></i>
            </div>

            <div class="dropdown__container">
              <div class="dropdown__content">
                <div class="dropdown__group">
                  <div class="dropdown__icon">
                    <i class="ri-code-line"></i>
                  </div>

                  <span class="dropdown__title">Support</span>

                  <ul class="dropdown__list">
                    <li>
                      <a href="#" class="dropdown__link">Contact</a>
                    </li>
                    <li>
                      <a href="#" class="dropdown__link">FAQ</a>
                    </li>
                  </ul>
                </div>

          <li>
            <a href="#" class="nav__link">About</a>
          </li>
          <ul class="nav__button">
            <li>
              <div class="menu-icon">
                <div class="nav-items"></div>
                <div class="search-icon">
                  <span class="fas fa-search"></span>
                </div>
                <div class="cancel-icon">
                  <span class="fas fa-times"></span>
                </div>
                <form id="search" action="{{ route('search') }}" method="GET">
                  <input type="text" name="query" class="search-input" placeholder="Search..." required>
                  <button type="submit" class="search-button">
                    <i class="ri-search-line"></i>
                  </button>
                </form>
              </div>

            </li>
            <li>
              <button id="switch">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="currentColor">
                  <path
                    d="M11.3807 2.01886C9.91573 3.38768 9 5.3369 9 7.49999C9 11.6421 12.3579 15 16.5 15C18.6631 15 20.6123 14.0843 21.9811 12.6193C21.6613 17.8537 17.3149 22 12 22C6.47715 22 2 17.5228 2 12C2 6.68514 6.14629 2.33869 11.3807 2.01886Z"></path>
                </svg>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="currentColor">
                  <path
                    d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z"></path>
                </svg>
              </button>
            </li>
            <li>
              <div class="login">
                <a href="{{ url('/dashboard') }}"><i class="ri-user-line"></i></a>
              </div>
            </li>
            <li>
              <div class="basket-container">
                <div class="nav_basket">
                  @php
                  $basket_count = \App\Models\BasketItem::where('user', Auth::id())->get()->count();
                  $total = 0;
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

                      $total += ($product->price * (1 - $product->discount) * $basket_item->quantity) / 100;

                      $image = $images->firstWhere('product', $product->id);

                      $file = 'cover.png';

                      if ($image != null)
                      {
                      $file = $image->file;
                      }
                      @endphp
                      <li>
                        <img height="60px" width="80px" src="{{ url('/images') }}/{{ $product->category }}/{{ $file }}" alt="">
                        <p class="nav__link">{{ ucwords($product->name) }}</p>
                        <p class="nav__link">x{{ $basket_item->quantity }}</p>
                        @if($basket_item->quantity < 100)
                          <a href="{{ url('/add') }}/{{ $product->id }}">+</a>
                          @endif
                          @if($basket_item->quantity > 1)
                          <a href="{{ url('/reduce') }}/{{ $product->id }}">-</a>
                          @endif
                          <a href="{{ url('/remove') }}/{{ $basket_item->id }}">x</a>
                      </li>
                      <li>
                        <span class="total-price">£{{ number_format(($product->price * $basket_item->quantity * (1 - $product->discount)) / 100, 2) }} &nbsp </span> | £{{ number_format(($product->price * (1 - $product->discount)) / 100, 2) }}/item
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
        </ul>
      </div>
    </nav>
  </header>