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
        <link rel="stylesheet" href="{{ url('/css/front.css') }}">

        <title>GAMERHUB</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header">
            <nav class="nav container">
                <div class="nav__data">
                    <a href="#" class="nav__logo">
                        </i> GAMERHUB
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
                            <a href="#" class="nav__link">Home</a>
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
    
                                        <a href="#" class="dropdown__title">Mice</a>
    
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
    
                                        <a href="#" class="dropdown__title">Keyboards</a>
    
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
    
                                        <a href="#" class="dropdown__title">Monitors</a>
    
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
    
                                        <a href="#" class="dropdown__title">Headset</a>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Bluetooth</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Combos</a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-mic-line"></i>
                                        </div>
    
                                        <a href="#" class="dropdown__title">Microphone</a>
    
                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">ddd</a>
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

                        <!--=============== DROPDOWN 3 ===============-->

                        <li class="dropdown__item">
                            <div class="nav__link dropdown__button">
                                Support <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-discount-percent-line"></i>
                                        </div>
                                        <a href="#" class="dropdown__title">About Us</a>
                                    </div>
    
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-arrow-right-up-line"></i>
                                        </div>
    
                                        <a href="{{ url('/contact') }}" class="dropdown__title">Contact US</a>
    
                                    </div>
                                </div>
                            </div>
                        </li>

                        

                        <li>
                            <a href="{{ url('/contact') }}" class="nav__link">Contact Us</a>
                        </li>
                        <li>
                            <div class="box">
                                <input type="text" placeholder="Search...">
                                    <a href="#"><i class="ri-search-line"></i></a>
                            </div>
                        </li>
                        <li>
                            <div class="login">
                                    <a href="#"><i class="ri-user-line"></i></a>
                            </div>
                        </li>
                        <li>
                            <div class="nav_basket">
                                <i class="ri-shopping-cart-line"></i>
                                <span class="basket-count">0</span>
                            </div>
                            <div class="basket-modal" id="basket-modal">
                                <div class="basket-content">
                                    <h2>Your Basket</h2>
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
        <section id="hero">
            <div class="hero-section">
                <div class="hero-content">
                    <h1><b>The way to <span>compete</span> with excellence</b></h1>
                    <button>Discover our Offers</button>
                </div>
            </div>
        </section>

        <!--=============== REASONS TO BUY ==========-->

        <section class="reason">
            <div class="reason-content">
                <p><b>Buying on GamerHub has its loads of perks</b></p>
            </div>

            <div class="reason-content">
                <div class="icones">
                    <a href="#"><i class='bx bxs-package'></i></a>
                </div>
                <a><b>Free shipping</b> within UK mainland</a>
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

        <!--=============== PRODUCT ===============-->

        <section class="section products">
            <div class="container">
    
              <h2 class="h2 section-title">Different Products</h2>
    
              <ul class="product-list">

            @foreach ($products as $product)
                <li class="w-50">
                  <a href="{{ url('/products') }}/{{ $product->id }}" class="product-card">
    
                    <figure class="card-banner">
                        @php
                        $image = $images->firstWhere('product', $product->id);
                        if ($image != null) 
                        {
                            $file = $image->file;
                        }
                        else 
                        {
                            $file = "cover.png";
                        }
                        @endphp
                      <img src="{{ url('/images') }}/{{ $product->category }}/{{ $file }}" class="img-cover">
                    </figure>
    
                    <div class="card-content">
    
                      <h3 class="h3 card-title">{{ $product->name }}</h3>
                    </div>
    
                  </a>
                </li>
            @endforeach
    
            </ul>
    
            </div>
        </section>

        <!--=============== FOOTER ===============-->
        <section class="footer">
            <div class="footer-content">
                <img src="{{ url('/images/logo.png') }}">      <!--=== TO DO ==-->
                <p>aaaaaaaaaa aaaaaaaaa aaaaaaaaaa aaaaaaaaaaa aaaaaaaaaa aaaaaaa</p>

                <div class="icons">
                    <a href="#"><i class='bx bxl-meta'></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                    <a href="#"><i class='bx bxl-twitter' ></i></a>
                    <a href="#"><i class='bx bxl-reddit' ></i></a>
                </div>
            </div>

            <div class="footer-content">
                <h4>Products</h4>
                <li><a href="#">Mice</a></li>
                <li><a href="#">Keyboards</a></li>
                <li><a href="#">Monitor</a></li>
                <li><a href="#">Microphone</a></li>
                <li><a href="#">Headset</a></li>
            </div>

            <div class="footer-content">
                <h4>Deals</h4>
                <li><a href="#">Discounted items</a></li>
                <li><a href="#">Black Friday</a></li>
                <li><a href="#">Bundles</a></li>
            </div>

            <div class="footer-content">
                <h4>Support</h4>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </div>

        </section>

        <!--=============== MAIN JS ===============-->
        <script src="{{ url('/js/front.js')}}"></script>
    </body>
</html>