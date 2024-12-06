<!DOCTYPE html>
<html lang="en">
    <!--Title-->
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== REMIXICONS ===============-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap">

        <!--=============== REMIXICONS ===============-->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('/css/category.css') }}">
        <script src="https://kit.fontawesome.com/6d6a721856.js" crossorigin="anonymous"></script>
        <title>{{ ucfirst($category) }} | GAMERHUB</title>
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
                        <a href="/Front_Page/index.html" class="nav__link">Home</a>
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

                                    <a href="#" class="dropdown__title">Contact US</a>

                                </div>
                            </div>
                        </div>
                    </li>

                    

                    <li>
                        <a href="#" class="nav__link">Contact Us</a>
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
        <!--=============== FOOTER ===============-->
        <section class="footer">
            <div class="footer-content">
                <img src="Our logo">      <!--=== TO DO ==-->
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
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </div>

        </section>
        
    







    </body>
</html>