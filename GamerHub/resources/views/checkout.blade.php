<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | GAMERHUB</title>
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

    <section class="checkout-section">
        <h2>Checkout</h2>
        <p>
            <a href="{{ url('/login') }}">Sign in</a> or <a href="{{ url('/register') }}">Create Account</a> to track orders and see items you may have added using another device.
        </p>
    </section>

    <div class="main-content">
        <section class="shipping-form" id="buy-now">
            <h3>Shipping</h3>
            <form id="checkout-form" action="#" method="POST">
                @csrf
                <h4>Contact Info</h4>
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" value="{{ Auth::user()->email }}" id="email" name="email" required placeholder="Enter your email">
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
                        <label for="first-name">First Name <span class="required">*</span></label>
                        <input type="text" id="first-name" name="first-name" required placeholder="Enter your first name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group half">
                        <label for="last-name">Last Name <span class="required">*</span></label>
                        <input type="text" id="last-name" name="last-name" required placeholder="Enter your last name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address 1 <span class="required">*</span></label>
                    <input type="text" id="address" name="address" required placeholder="Start typing your street address">
                </div>

                <div class="form-group">
                    <label for="address2">+ Add Apt, Suite, Building (Optional)</label>
                    <input type="text" id="address2" name="address2" placeholder="Apartment, suite, or building">
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label for="city">City <span class="required">*</span></label>
                        <input type="text" id="city" name="city" required placeholder="Enter your city">
                    </div>
                    <div class="form-group half">
                        <label for="postal-code">Postal Code <span class="required">*</span></label>
                        <input type="text" id="postal-code" name="postal-code" required placeholder="Enter your postal code">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone-number">Phone Number <span class="required">*</span></label>
                    <input type="tel" id="phone-number" name="phone-number" required placeholder="Enter your phone number">
                </div>

                <button type="submit" class="submit-btn">Save And Continue</button>
            </form>

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

            <div id="compressed-view-method" class="compressed-view" style="display: none;">
                <h3>Shipping Method <span style="color: green;">✔</span></h3>
                <div class="compressed-block">
                    <h4 id="compressed-method">Standard Shipping - Free</h4>
                    <p id="compressed-method-details">2-3 business days*</p>
                </div>
                <a href="#" id="edit-method">Edit</a>
            </div>

            <div id="shipping-method-section" style="display: none;">
                <h3>Shipping Method</h3>
                <div class="shipping-methods">
                    <div class="method">
                        <input type="radio" id="standard-shipping" name="shipping-method" value="Standard Shipping" data-details="2-3 business days*" checked>
                        <label for="standard-shipping">
                            <strong>Standard Shipping</strong>
                            <span>2-3 business days*</span>
                            <span class="price">Free</span>
                        </label>
                    </div>
                    <div class="method">
                        <input type="radio" id="expedited-shipping" name="shipping-method" value="Expedited Shipping" data-details="1-2 business days*">
                        <label for="expedited-shipping">
                            <strong>Expedited Shipping</strong>
                            <span>1-2 business days*</span>
                            <span class="price">Free</span>
                        </label>
                    </div>
                </div>
                <form action="{{ url('/checkout/save') }}" method="POST">
                    @csrf
                    <button type="submit" class="save-and-continue-btn">Continue</button>
                </form>
            </div>
        </section>

        <!-- Summary section: displays the selected products, their quantities, and total prices - implemented by Jayden Beach -->
        <section class="summary">
            <h3>Summary</h3>
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
            <div class="summary-item">
                <img height="150px" width="150" src="{{ url('/images') }}/{{ $product->category }}/{{ $file }}" alt="product image">
                <div class="product-details">
                    <form action="{{ url('/remove') }}" method="POST">
                        @csrf
                        <input hidden name="id" value="{{ $basket_item->id }}">
                        <input hidden name="user" value="{{ $basket_item->user }}">
                        <button id="remove_from_cart" aria-label="Remove from Cart" type="submit" value="Remove from Cart">x</button>
                    </form>
                    <p class="product-name">{{ $product->name }}</p>
                    <div class="quantity-section">
                        <p class="quantity-label">Quantity:</p>
                        <div class="quantity-control">
                            @if($basket_item->quantity > 1)
                            <form action="{{ url('/add') }}" method="POST">
                                @csrf
                                <input hidden type="number" name="product" value="{{ $product->id }}">
                                <input hidden type="number" id="quantity" name="quantity" value="-1">
                                <button id="decrease-quantity" class="quantity-btn" type="submit">-</button>
                            </form>
                            @endif
                            <span id="quantity-value">{{ $basket_item->quantity }}</span>
                            @if($basket_item->quantity < 100)
                                <form action="{{ url('/add') }}" method="POST">
                                @csrf
                                <input hidden type="number" name="product" value="{{ $product->id }}">
                                <input hidden type="number" id="quantity" name="quantity" value="1">
                                <button id="increase-quantity" class="quantity-btn" type="submit">+</button>
                                </form>
                                @endif
                        </div>
                    </div>
                    <p class="product-price">£{{ number_format(($product->price * $basket_item->quantity) / 100, 2) }}</p>
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
                $total = $total + ($products->firstWhere('id', $basket_item->product)->price * $basket_item->quantity);
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
    <script src="https://www.paypal.com/sdk/js?client-id=AWijUcO1_gYQ4twvve6K-0sChf3-rTdVDd3ANH2etbNjRCpl_f9Ryig1R7r9PX4-mlb8VAvHkNmiAAaM&currency=GBP"></script>
</body>

</html>