@extends('layouts.layout')

@section('css')
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
</style>
@endsection

@section('title')
<title>Orders | GamerHub</title>
@endsection

@section('content')
<div class="content-section">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="section-title">My Orders</h3>

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
                        @foreach ($orders as $order)
                        <a href="{{ url('/orders') }}/{{ $order->id }}">
                            <tr class="row" onclick="window.location='/orders/<?php echo $order->id ?>'">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->shipping_method }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        </a>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
@endsection