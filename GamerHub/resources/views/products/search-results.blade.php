@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{ url('/css/reuse.css') }}">
</head>
<body>



<h1>Search Results for "{{ $query }}"  </h1>

@if($products->isEmpty())

    <h1> No Products Found</h1>
@else
    <div class="product-list">
        @foreach($products as $product)
            <div class="product">


                <a href="{{ url('/products') }}/{{ $product->id }}" class="product-card">
                    <div class="card-content">

                        <h2>{{ $product->name }}</h2>

                        <p>Price: £{{ $product->price / 100 }}</p>
                        <p>{{ $product->description }}</p>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif

</body>
</html>


{{--CSS--}}
<style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 150px;
    }

    .product {
        width: 30%;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
        padding: 15px;
    }

    /* product card link */

    .product-card {
        text-decoration: none;
        color: #000;
        display: block;
    }

    .product-card:hover {
        transform: scale(1.05);
    }

    .product h2 {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .product p {
        font-size: 1rem;
        margin-bottom: 10px;
    }

    h1{
        padding: 20px;
    }


</style>
