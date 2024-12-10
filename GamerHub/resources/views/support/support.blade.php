@extends('layouts.layout')
<!-- External CSS and Icons -->
@section('css')
<link rel="stylesheet" href="{{ url('/css/support.css') }}">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
@endsection

@section('title')
<title>Support | GAMERHUB</title>
@endsection

@section('content')
<!-- Banner Section -->
<section class="banner">
    <div class="banner-content">
        <h2>Welcome to GamerHub Support</h2>
        <h1>Find a solution</h1>
    </div>
</section>

<!-- Search Section - GPT help "Quick - non functional soft search bar which can be built upon in future"-->
<section class="search-section">
    <p>Need to check the previous case? <a href="#">See your cases</a></p>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search Support">
        <button id="search-button">Search</button>
    </div>
</section>

<!-- Product Selection Section -->
<section id="product-section" class="product-section">
    <h1 class="section-title">Select Product</h1>
    <p class="section-subtitle">Access product drivers, manuals, FAQs, and more.</p>
    <div class="product-grid">
        <!-- Product Item for Mice -->
        <div class="product-item" onclick="showCategory('Mice')">
            <img src="images/products/mice/ErgonomicMice(1).png" alt="Mice">
            <h3>Mice</h3>
        </div>
    </div>
</section>

<!-- Category Section ( Hidden till open) -->
<section id="category-section" class="category-section hidden">
    <a href="#" class="back-link" onclick="showProductSection()">← All Products</a>
    <h1 id="category-title">Mice Support and Services</h1>
    <hr>

    <!-- Product Support Details -->
    <div class="product-support">
        <!-- Dropdown for Product Series -->
        <div class="dropdown">
            <label for="product-series">Select your Product Series</label>
            <select id="product-series">
                <option value="Wireless">Wireless</option>
                <option value="Wired">Wired</option>
                <option value="Ergonomic">Ergonomic</option>
                <option value="Stylus">Stylus</option>
                <option value="Gaming">Gaming</option>
            </select>
        </div>

        <!-- Product Details Display -->
        <div class="product-info">
            <img id="selected-mouse-image" src="images/products/mice/WirelessMouse(1).png" alt="Selected Mouse">
            <p id="selected-mouse-title">Wireless Mouse</p>
            <a href="{{ url('/faq') }}" id="faq-button" class="faq-button">FAQ</a>
        </div>
    </div>
</section>

<!-- Contact Prompt Section -->
<section class="contact-prompt">
    <h1>Still need help?</h1>
    <p>If your question isn’t answered in the FAQs or product support, feel free to contact us directly.</p>
    <a href="{{ url('/contact') }}" class="contact-link">Contact Us</a>
</section>

<footer>
    <p>&copy; 2024 GamerHub. All rights reserved.</p>
</footer>

<script src="{{ url('/js/support.js') }}"></script>
<!-- EmailJS Setup -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3.11.0/dist/email.min.js"></script>
<script>
    emailjs.init("l_sqHPwRue0BZ7XSc");
</script>
@endsection