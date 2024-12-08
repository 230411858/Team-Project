<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ url('/css/reuse.css') }}">

    @yield('css')

    @yield('title')
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="{{ url('/') }}" class="nav__logo">
                    <img src="{{ url('/images/logo.png') }}" width="300px" height="100px">
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__toggle-menu"></i>
                    <i class="ri-close-line nav__toggle-close"></i>
                </div>

                <div class="nav_basket">
                    <i class="ri-shopping-cart-line"></i>
                    <span class="basket-count">0</span>
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

                                    <a href="{{ url('/products/category/mice') }}" class="dropdown__title">Mice</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Light</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Heavy</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Combos</a>
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
                                        <li>
                                            <a href="#" class="dropdown__link">Combos</a>
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
                                        <li>
                                            <a href="#" class="dropdown__link">Dual Monitor</a>
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
                                            <a href="#" class="dropdown__link">Bluetooth</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Combos</a>
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
                                        <i class="ri-discount-percent-line"></i>
                                    </div>
                                    <a href="#" class="dropdown__title">Discounts</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Black Friday</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Discounted items</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-arrow-right-up-line"></i>
                                    </div>

                                    <a href="#" class="dropdown__title">Bundles</a>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">M&K</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Full setup</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!--=============== Contact ===============-->
                    <li>
                        <a href="{{ url('/contact') }}" class="nav__link">Contact</a>
                    </li>

                    <!--=============== About ===============-->
                    <li>
                        <a href="{{ url('/') }}" class="nav__link">About</a>
                    </li>

                    <!--=============== Search ===============-->
                    <li>
                        <div class="box">
                            <input type="text" placeholder="Search...">
                            <a href="#"><i class="ri-search-line"></i></a>
                        </div>
                    </li>

                    <!--=============== Login ===============-->
                    <li>
                        <div class="login">
                            <a href="#"><i class="ri-user-line"></i></a>
                        </div>
                    </li>

                    <!--=============== Basket ===============-->
                    <li>
                        <div class="nav_basket">
                            <i class="ri-shopping-cart-line"></i>
                            <span class="basket-count">0</span>
                        </div>
                        <div class="basket-modal" id="basket-modal">
                            <div class="basket-content">
                                <h2 href="test">Your Basket</h2>
                                <ul class="basket-items"></ul>
                                <div class="basket-total">
                                    <span>Total:</span>
                                    <span class="total-price">£0.00</span>
                                </div>
                                <button class="checkout-btn">Checkout</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>