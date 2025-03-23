<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">
            @if (Auth::user()->account_type === 'admin')
            {{ __('Admin Dashboard') }}
            @else
            {{ __('My Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="content-section">
        <div class="container">

            @if (Auth::user()->account_type === 'admin')
            {{-- Admin Stats --}}
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Customers</h3>
                    @php 
                    $totalCustomers = \App\Models\User::where('account_type', 'customer')->get()->count();
                    @endphp
                    <p>{{ $totalCustomers }}</p>
                </div>
                <div class="stat-card">
                    <h3>Total Orders</h3>
                    @php
                    $orders = \App\Models\Order::all();

                    $order_items = \App\Models\OrderItem::all();

                    $products = \App\Models\Product::all();

                    $count = 0;

                    $total_revenue = 0;

                    foreach ($orders as $order)
                    {
                        $order_items = \App\Models\OrderItem::where('oid', $order->id)->get();
                        foreach ($order_items as $order_item)
                        {
                            $count++;

                            $product = $products->firstWhere('id', $order_item->product);

                            $total_revenue += $product->price * (1 - $order_item->discount) * $order_item->quantity;
                        }

                    $total_revenue += $order->shipping_method == 'standard' ? 299 : 499;

                    }
                    @endphp
                    <p>{{ $count }}</p>
                </div>
                <div class="stat-card">
                    <h3>Total Revenue</h3>
                    
                    <p>£{{ number_format($total_revenue / 100, 2) }}</p>
                </div>
                <div class="stat-card alert">
                    <h3>Low Stock Products</h3>
                    {{-- <p>{{ $lowStockCount }}</p>--}}
                </div>
            </div>

                @php
                    $lowStockCount = \App\Models\Product::where('stock', '<', 5)->count();
                @endphp
                <div class="stat-card alert">
                    <a href="{{ route('admin.lowstock') }}" class="stat-card-link">
                        <h3>Low Stock Items</h3>
                        <p>{{ $lowStockCount }}</p>
                    </a>
                </div>




                {{-- Quick Actions --}}
            <div class="quick-actions">
                <a href="{{ route('admin.customers.index') }}" class="action-button">
                    👥 Manage Customers
                </a>
                <a href="{{ route('admin.inventory.index') }}" class="action-button">
                    📦 Inventory Management
                </a>
{{--                <a href="{{ route('admin.orders.index') }}" class="action-button">--}}
                🛒 View Orders
{{--                </a>--}}
                <a href="{{ route('admin.reports') }}" class="action-button">
                📊 View Reports
                </a>
                <a href="{{ route('admin.products.create') }}" class="action-button">
                    ➕ Add Products
                </a>
            </div>
        </div>
    </div>

    <style>
        .content-section {
            padding: 40px 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        .page-header {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        /* Stats Grid */
        .stats-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 22%;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .stat-card.alert {
            background: #ffcc00;
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .action-button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .action-button:hover {
            background-color: #0056b3;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</x-app-layout>