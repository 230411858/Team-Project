<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Low Stock Products') }}
        </h2>
    </x-slot>


    <div class="content-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="section-title">Products with Low Stock (≤ 5)</h3>

                    @if(count($lowStockProducts) === 0)
                        <p class="success-message">🎉 All products are sufficiently stocked!</p>
                    @else
                        <table class="inventory-table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lowStockProducts as $product)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="product-link">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($product->stock <= 0)
                                            <span class="out-of-stock">Out of Stock</span>
                                        @else
                                            <span class="low-stock">Low Stock ({{ $product->stock }})</span>
                                        @endif
                                    </td>
                                    <td>£{{ number_format($product->price / 100, 2) }}</td>
                                    <td>
                                        <a href="{{ route('admin.inventory.edit', $product->id) }}" class="edit-button">Edit</a>
                                        |
                                        <form action="{{ route('admin.inventory.delete', $product->id) }}" method="POST" class="inline-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="delete-button">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
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

        .low-stock {
            color: #ff9800;
            font-weight: bold;
        }

        .out-of-stock {
            color: #d32f2f;
            font-weight: bold;
        }

        .edit-button, .delete-button {
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

        .product-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .product-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</x-app-layout>
