@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/order.css') }}">
@endsection

@section('title')
<title>My Order | GAMERHUB</title>
@endsection

@section('content')
<div class="order-box">
    <h1>Order #{{ $order->id }} <span style="float: right;">{{ $order->created_at }}</span></h1>
    <hr>
    <h2>{{ $order->first_name }} {{ $order->last_name }}</h2>
    <h2>{{ $order->email }}</h2>
    <h1>Address</h1>
    <hr>
    <h2>{{ $order->address_line_1 }}</h2>
    <h2>{{ $order->address_line_2 }}</h2>
    <h2>{{ $order->city }}</h2>
    <h2>{{ $order->country }}</h2>
    <h2>{{ $order->postcode }}</h2>
    <h2>{{ $order->phone_number }}</h2>
    <div class="order-status">
        @switch ($order->status)

        @case ('in-transit')
        <img class="order-status-image" src="{{ url('/images/in-transit.svg') }}" alt="">
        <h1 class="update-text">Your order is on your way to you now</h1>
        @break
        @case ('delivered')
        <img class="order-status-image" src="{{ url('/images/delivered.svg') }}" alt="">
        <h1 class="update-text">Your order has been delivered</h1>
        @break
        @default ('processing')
        <img class="order-status-image" src="{{ url('/images/processing.svg') }}" alt="">
        <h1 class="update-text">We are curently processing your order
            <span id="updated-at">(Last updated {{ $order->updated_at }})</span>
        </h1>
        @break
        @endswitch
    </div>
    <hr>
    @php
    $order_items = App\Models\OrderItem::where('oid', $order->id)->get();
    $products = App\Models\Product::all();
    $product_images = App\Models\ProductImage::all();
    $subtotal = 0;
    @endphp
    @foreach ($order_items as $order_item)
    @php
    $product = $products->firstWhere('id', $order_item->product);

    $product_image = $product_images->firstWhere('product', $product->id);

    $subtotal = ($product->price * (1 - $order_item->discount) * $order_item->quantity);

    $discount_amount = 0;

    $file = 'cover.png';

    if ($product_image != null)
    {
    $file = $product_image->file;
    }
    @endphp
    <div class="order-item-overview">
        <img class="order-item-image" src="{{ url('/images') }}/{{ $product->category }}/{{ $file }}" alt="Product Image">
        <div class="order-item-text">
            {{ ucwords($product->name) }}
            <br>
            <i>
                ({{ ucwords($product->sub_category) }}, {{ ucwords($product->category) }})
            </i>
            <br>
            @if ($product->discount > 0)
            <s>
                £{{ number_format($product->price / 100, 2) }}
            </s>
            <b class="discounted-price">
                £{{ number_format(($product->price * (1-$product->discount)) / 100, 2) }}
            </b>
            @else
            <b>
                £{{ number_format($product->price / 100, 2) }}
            </b>
            @endif
            <br>
            <p>
                Quantity: {{ $order_item->quantity }}
            </p>
            <br>
            <br>
            <p id="product-id">
                #{{ $product->id }}
            </p>
            <a id="product-link" href="{{ url('/products') }}/{{ $product->id }}">View product</a>
        </div>
        <div class="order-item-subtotal">

        </div>
    </div>
    <hr>
    @endforeach
    <div class="order-item-overview">
        <div class="final-values-titles">
            <p class="subtotal">
                Subtotal
            </p>
            <p class="discount-amount">
                Discount
            </p>
            <p class="shipping-cost">
                Shipping ({{ ucwords($order->shipping_method) }})
            </p>
            <p class="grand-total">
                Total
            </p>
        </div>
        <div class="final-values">
            <p class="subtotal">
                £{{ number_format($subtotal / 100, 2) }}
            </p>
            <p class="discount-amount">
                £-{{ number_format($discount_amount, 2) }}
            </p>
            <p class="shipping-cost">
                £{{ number_format(($order->shipping_method == 'standard' ? 299 : 499) / 100, 2) }}
            </p>
            <p class="grand-total">
                £{{ number_format(($subtotal - $discount_amount) / 100, 2) }}
            </p>
        </div>
    </div>
    <hr>
</div>
@endsection