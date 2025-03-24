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
                    <h3>Total Items Ordered<br>(Total Orders Placed)</h3>
                    @php
                    $orders = \App\Models\Order::all();

                    $order_items = \App\Models\OrderItem::all();

                    $products = \App\Models\Product::all();

                    $order_count = count($orders);

                    $order_item_count = 0;

                    $total_revenue = 0;

                    foreach ($orders as $order)
                    {
                    $order_items = \App\Models\OrderItem::where('oid', $order->id)->get();

                    foreach ($order_items as $order_item)
                    {
                    $order_item_count += $order_item->quantity;

                    $product = $products->firstWhere('id', $order_item->product);

                    $total_revenue += $product->price * (1 - $order_item->discount) * $order_item->quantity;
                    }

                    $total_revenue += $order->shipping_method == 'standard' ? 299 : 499;

                    }
                    @endphp
                    <p>{{ $order_item_count }}<br>({{ $order_count }})</p>
                </div>
                <div class="stat-card">
                    <h3>Total Revenue</h3>

                    <p>£{{ number_format($total_revenue / 100, 2) }}</p>
                </div>
                @php
                $lowStockCount = \App\Models\Product::where('stock', '<', 5)->count();
                    @endphp
                    <div onclick="window.location.href = '/admin/admin/low-stock'" class="stat-card alert">
                        <h3>Low Stock Products</h3>
                        <p>{{ $lowStockCount }}</p>
                    </div>
            </div>

            {{-- Quick Actions --}}
            <div class="quick-actions">
                <a href="{{ route('admin.customers.index') }}" class="action-button">
                    👥 Manage Customers
                </a>
                <a href="{{ route('admin.inventory.index') }}" class="action-button">
                    📦 Inventory Management
                </a>
                <a href="{{ url('/orders') }}" class="action-button">
                    🛒 View Orders
                </a>
                <a href="{{ route('admin.products.create') }}" class="action-button">
                    ➕ Add Products
                </a>
            </div>
            @else
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date</th>
                            <th>Email</th>
                            <th>Shipping Method</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $orders = \App\Models\Order::where('user', Auth::id())->orderByDesc('created_at')->limit(10)->get();
                        @endphp
                        @foreach ($orders as $order)
                        <a href="{{ url('/orders') }}/{{ $order->id }}">
                            <tr class="row" onclick="window.location='/orders/<?php echo $order->id ?>'">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ ucwords($order->shipping_method) }}</td>
                                <td>{{ ucwords($order->status) }}</td>
                            </tr>
                        </a>
                        @endforeach
                    </tbody>
                </table>
                <button onclick="window.location.href = '/orders'" type="button" class="spec-det">See all my orders</button>
            @endif
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
    <style>
    .content-section {
        padding: 40px 0;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0px 20px;
    }

    .card {
        background: white;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .success-message {
        color: green;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .inventory-table {
        width: 100%;
        border-collapse: collapse;
    }

    .inventory-table th,
    .inventory-table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    .inventory-table th {
        background: #f8f8f8;
    }

    .edit-button,
    .delete-button {
        padding: 6px 12px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    .edit-button {
        color: white;
        background-color: #007bff;
    }

    .edit-button:hover {
        background-color: #0056b3;
    }

    .delete-button {
        color: white;
        background-color: #dc3545;
        border: none;
    }

    .delete-button:hover {
        background-color: #c82333;
    }

    .inline-form {
        display: inline;
    }

    .row:hover {
            color: white;
            background-color: orange;
            cursor: pointer;
        }
        .spec-det {
  padding: 0.75rem 2rem;
  background-color: orange;
  width: 100%;
  border: none;
  color: white;
  font-weight: bold;
  font-size: 1rem;
  border-radius: 30px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.spec-det:hover {
  color: white;
  background-color: coral;
}
</style>
</x-app-layout>