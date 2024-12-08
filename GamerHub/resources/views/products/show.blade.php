@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ url('/css/product.css') }}">
@endsection

@section('title')
<title>{{ $product->name }} | GAMERHUB</title>
@endsection

@section('content')
<!-- Products part -->
<h1 class="name-p">{{ $product->name }}</h1>
<div class="page-p container">

    <div class="main-p">

        <div class="images-p">

            <div class="image-main-p">
                @php
                $image = $images->firstWhere('product', $product->id);
                if ($image == null)
                {
                $file = $product->category . '/' . 'cover.png';
                }
                else
                {
                $file = $product->category . '/' . $image->file;
                }
                @endphp
                <img src="{{ url('/images') }}/{{ $file }}" alt="Product Image" id="Mainpicture">
            </div>

            <div class="thumbnails">
                @foreach ($images as $image)
                @php
                $file = "$product->category/$image->file"
                @endphp
                <img src="{{ url('/images') }}/{{ $file }}" alt="thumbnail1" onclick="changeImage('{{ url('/') }}/images/{{ $file }}')">
                @endforeach
            </div>

        </div>


        <div class="details-p">

            <p class="description-p">
                {{ $product->description }}
            </p>
            <p class="price-p">Price: £<span id="price">{{ $product->price / 100 }}</span></p>

            <div class="quantity-section">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" value="1" min="1" onchange="updateTotal()">
                <p>Total: £<span id="total">{{ $product->price / 100 }}</span></p>
            </div>
            <button class="cart-butt" aria-label="Add to Cart">Add to Cart</button>


            <div class="extra-info">
                <div class="info-section">
                    <h3>Free Shipping and Returns</h3>
                    <p>{{ $product->description }}</p>
                </div>

                <div class="info-section">
                    <h3>Items We Suggest</h3>
                    <ul>
                        <li>ERGO K860 - £99.99</li>
                        <li>Zone Vibe 100 - £99.99</li>
                    </ul>
                </div>


                <div class="specs-main">
                    <button type="button" class="spec-det">Specs & Details</button>
                    <div class="specstable">
                        <ul>
                            <li>Height: 132.5 mm</li>
                            <li>Width: 99.8 mm</li>
                            <li>Depth: 51.4 mm</li>
                            <li>Weight: 164 g</li>
                        </ul>
                    </div>
                </div>


                <div class="compat-main">
                    <button type="button" class="-compatibility">Specs & Details</button>
                    <div class="compat">
                        <ul>
                            <li>Windows 10, 11 or later</li>
                            <li>macOS 12 or later</li>
                            <li>Linux</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<script>
    var coll = document.getElementsByClassName("spec-det");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

<!-- MAIN JS -->
<script src="{{ url('/js/product.js') }}"></script>
@endsection