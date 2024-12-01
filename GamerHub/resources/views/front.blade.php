<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    
                                        <span class="dropdown__title">Mouses</span>
    
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
    
                                        <span class="dropdown__title">Keyboards</span>
    
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
    
                                        <span class="dropdown__title">Monitors</span>
    
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
    
                                        <span class="dropdown__title">Headset</span>
    
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
    
                                        <span class="dropdown__title">Microphone</span>
    
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
                                        <span class="dropdown__title">Discounts</span>
    
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
    
                                        <span class="dropdown__title">Bundles</span>
    
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
    
                                        <span class="dropdown__title">Bundles</span>
    
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

                        <li>
                            <a href="#" class="nav__link">Support</a>
                            
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
                    </ul>
                </div>
            </nav>
        </header>
        <div class="hero-section">
            <div class="hero-content">
                <h1><b>The way to <span>compete</span> with excellence</b></h1>
                <button>Discover our Offers</button>
            </div>
        </div>
        <!--=============== MAIN JS ===============-->
        <script src="{{ url('/js/front.css') }}"></script>
    </body>
</html>