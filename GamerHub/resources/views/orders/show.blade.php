<x-app-layout>

    <link rel="stylesheet" href="{{ url('/css/orders.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Order #{{ $order->id }} <span style="float: right;">{{ $order->created_at }}</span></h1>
                    <h2>{{ $order->first_name }}  {{ $order->last_name }}</h2>
                    <h2>{{ $order->email }}</h2>
                    <h1>Address</h1>
                    <h2>{{ $order->address_line_1 }}</h2>
                    <h2>{{ $order->address_line_2 }}</h2>
                    <h2>{{ $order->city }}</h2>
                    <h2>{{ $order->country }}</h2>
                    <h2>{{ $order->postcode }}</h2>
                    <h2>{{ $order->phone_number }}</h2>
                    <h1>{{ $order->status }}</h1>
                    @php
                    $order_items = App\Models\OrderItem::where('oid', $order->id)->get();
                    $products = App\Models\Product::all();
                    $product_images = App\Models\ProductImage::all();
                    @endphp
                    @foreach ($order_items as $order_item)
                    <div>
                    <img src="{{ url('/images/wireless1.png') }}" alt="">
                    {{$order_item->product}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
