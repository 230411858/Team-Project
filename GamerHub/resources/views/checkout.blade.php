<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamerHub | Checkout</title>
    <link rel="stylesheet" href="{{ url('/css/checkout.css') }}">
</head>

<body>

    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="{{ url('/') }}" class="navbar_logo">
                    <img src="{{ url('/images/logo.png') }}" alt="GamerHub Logo" class="logo">
                </a>
            </div>
        </nav>
    </header>

    @if (!Auth::check())
    <section class="checkout-section">
        <h2>Checkout</h2>
        <p>
            <a href="../Front_Page/login and sign up/login and sign up.html">Sign in</a> or
            <a href="../Front_Page/login and sign up/login and sign up.html">Create Account</a> to track orders and see items you may have added using another device.
        </p>
    </section>
    @endif

    <div class="main-content">
        <section class="shipping-form" id="buy-now">
            <h3>Shipping</h3>
            <form id="checkout-form" action="{{ url('/checkout') }}" method="POST">
                @csrf
                <!-- Shipping Details Section -->
                <div id="shipping-details-section">
                    <h4>Contact Info</h4>
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required placeholder="Enter your email">
                        <p class="helper-text">Order updates will be sent to this address.</p>
                    </div>

                    <h4>Shipping Address</h4>
                    <div class="form-group">
                        <label for="country">Country <span class="required">*</span></label>
                        <select id="country" name="country" required>
                            <option value="United Kingdom" selected>United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Canada">Canada</option>
                            <option value="Australia">Australia</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="first_name">First Name <span class="required">*</span></label>
                            <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name">
                        </div>
                        <div class="form-group half">
                            <label for="last_name">Last Name <span class="required">*</span></label>
                            <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address_line_1">Address 1 <span class="required">*</span></label>
                        <input type="text" id="address_line_1" name="address_line_1" required placeholder="Start typing your street address">
                    </div>

                    <div class="form-group">
                        <label for="address_line_2">+ Add Apt, Suite, Building (Optional)</label>
                        <input type="text" id="address_line_2" name="address_line_2" placeholder="Apartment, suite, or building">
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="city">City <span class="required">*</span></label>
                            <input type="text" id="city" name="city" required placeholder="Enter your city">
                        </div>
                        <div class="form-group half">
                            <label for="postcode">Postcode <span class="required">*</span></label>
                            <input type="text" id="postcode" name="postcode" required placeholder="Enter your postcode">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number <span class="required">*</span></label>
                        <input type="tel" id="phone_number" name="phone_number" required placeholder="Enter your phone number">
                    </div>

                    <button type="button" id="save-shipping-details" class="submit-btn">Save And Continue</button>
                </div>

                <!-- Compressed Shipping View -->
                <div id="compressed-view" style="display: none;">
                    <h3>Shipping <span style="color: green;">✔</span></h3>
                    <div class="compressed-block">
                        <h4>Shipping Address</h4>
                        <p id="compressed-shipping"></p>
                    </div>
                    <div class="compressed-block">
                        <h4>Billing Address</h4>
                        <p id="compressed-billing"></p>
                    </div>
                    <a href="#" id="edit-shipping">Edit</a>
                </div>

                <!-- Shipping Method Section -->
                <div id="shipping-method-section" style="display: none;">
                    <h3>Shipping Method</h3>
                    <div class="shipping-methods">
                        <div class="method">
                            <input
                                type="radio"
                                id="standard"
                                name="shipping_method"
                                value="standard"
                                data-details="2-3 business days"
                                checked>
                            <label for="standard">
                                <span class="method-name">Standard Shipping</span>
                                <span class="method-time">2-3 business days</span>
                                <span class="method-price">£2.99</span>
                            </label>
                        </div>
                        <div class="method">
                            <input
                                type="radio"
                                id="express"
                                name="shipping_method"
                                value="express"
                                data-details="1-2 business days">
                            <label for="express">
                                <span class="method-name">Express Shipping</span>
                                <span class="method-time">1-2 business days</span>
                                <span class="method-price">£4.99</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" id="save-shipping-method" class="save-and-continue-btn">Continue</button>
                </div>

                <!-- Compressed Shipping Method View -->
                <div id="compressed-view-method" style="display: none;">
                    <h3>Shipping Method <span style="color: green;">✔</span></h3>
                    <div class="compressed-block">
                        <h4 id="compressed-method">Standard Shipping</h4>
                        <p id="compressed-method-details">2-3 business days</p>
                    </div>
                    <a href="#" id="edit-method">Edit</a>
                </div>
            </form>
        </section>

        <!-- Summary section: displays the selected products, their quantities, and total prices - implemented by Jayden Beach -->
        <section class="summary">
            <h3>Summary</h3>
            @foreach ($basket_items as $basket_item)
            @php
            $product = $products->firstWhere('id', $basket_item->product);
            $image = $images->firstWhere('product', $product->id);
            @endphp
            <div class="summary-item">
                <img height="150px" width="150" src="{{ url('/images') }}/{{ $product->category }}/{{ $image == null ? 'cover.png' : $image->file }}" alt="product image">
                <div class="product-details">
                    <a class="quantity-btn" href="{{ url('/remove') }}/{{ $basket_item->id }}">x</a>
                    <p class="product-name">{{ ucwords($product->name) }}</p>
                    <div class="quantity-section">
                        <p class="quantity-label">Quantity:</p>
                        <div class="quantity-control">
                            @if($basket_item->quantity > 1)
                                <a id="decrease-quantity" class="quantity-btn" href="{{ url('/reduce') }}/{{ $product->id }}">-</a>
                            @endif
                            <span id="quantity-value">{{ $basket_item->quantity }}</span>
                            @if($basket_item->quantity < 100)
                                <a id="increase-quantity" class="quantity-btn" href="{{ url('/add') }}/{{ $product->id }}">+</a>
                            @endif
                        </div>
                    </div>
                    <p class="product-price">£{{ number_format(($product->price * $basket_item->quantity * (1 - $product->discount)) / 100, 2) }}</p>
                </div>
            </div>
            <div class="divider small-divider"></div>
            @endforeach
            <div class="summary-item">
                <p>Subtotal</p>
                @php
                $total = 0;
                foreach ($basket_items as $basket_item)
                {
                $total = $total + ($products->firstWhere('id', $basket_item->product)->price * $basket_item->quantity * (1 - $product->discount));
                }
                $total = $total / 100;
                @endphp
                <p id="subtotal-price">£{{ number_format($total,2) }}</p>
            </div>

            <!-- Savings section: displays discounts if applicable - implemented by Jayden Beach -->
            <div id="savings-section" class="summary-item" style="display: none;">
                <p>Savings</p>
                <p id="savings-price">£0.00</p>
            </div>

            <div class="divider thick-divider"></div>
            <!--Total Price Section - implemented by Jayden Beach -->
            <div class="summary-item total">
                <p>Total</p>
                <p id="total-price">£{{ number_format($total,2) }}</p>
            </div>
            <!--Promo code input and application section - implemented by Jayden Beach -->
            <div class="promo-code">
                <label for="promo-input">Promo Code:</label>
                <input type="text" id="promo-input" placeholder="Enter promo code">
                <button id="apply-promo">Apply</button>
                <p id="promo-message"></p>
            </div>
            <div id="paypal-button-container"></div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 GamerHub. All rights reserved.</p>
    </footer>

    <script src="{{ url('/js/checkout.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AWijUcO1_gYQ4twvve6K-0sChf3-rTdVDd3ANH2etbNjRCpl_f9Ryig1R7r9PX4-mlb8VAvHkNmiAAaM&currency=GBP"></script>
</body>

</html>