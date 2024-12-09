@extends('layouts.layout')

@section('title')
<title>About | GAMERHUB</title>
@endsection

@section('content')
<!--=============== ABOUT US SECTION ===============-->
<main>
<section class="about-us container">
    <h1 class="about-us__title">About GamerHub</h1>
    <p class="about-us__description">
        Welcome to GamerHub, your ultimate destination for high-quality gaming accessories designed to elevate your gaming experience.
        We are passionate about gaming and committed to providing our customers with the best products and services to meet their needs.
    </p>

    <div class="about-us__content">
        <div class="about-us__image">
        </div>
        <div class="about-us__text">
            <h2>Our Mission</h2>
            <p>
                At GamerHub, our mission is to empower gamers by offering a wide range of cutting-edge gaming accessories,
                from ergonomic mice and mechanical keyboards to immersive headsets and ultra-clear monitors.
                We believe in delivering value, innovation, and quality in every product we offer.
            </p>
            <h2>Why Choose Us?</h2>
            <ul class="about-us__list">
                <li><i class="ri-checkbox-circle-line"></i> High-quality gaming gear at competitive prices</li>
                <li><i class="ri-checkbox-circle-line"></i> Fast and reliable shipping</li>
                <li><i class="ri-checkbox-circle-line"></i> Dedicated customer support team</li>
                <li><i class="ri-checkbox-circle-line"></i> Exclusive deals and discounts</li>
            </ul>
        </div>
    </div>
</section>
</main>
<!--=============== MAIN JS ===============-->
<script src="{{ url('/js/front.js') }}"></script>
</body>
</html>

<style>
    .about-us {
        padding: 3rem 1rem;
        text-align: center;
    }
    .about-us__title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    .about-us__description {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: #555;
    }
    .about-us__content {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 2rem;
    }
    .about-us__image img {
        max-width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .about-us__text {
        max-width: 600px;
        text-align: left;
    }
    .about-us__text h2 {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 1rem;
    }
    .about-us__text p {
        font-size: 1rem;
        line-height: 1.6;
        color: #666;
        margin-bottom: 1rem;
    }
    .about-us__list {
        list-style: none;
        padding: 0;
    }
    .about-us__list li {
        font-size: 1rem;
        margin: 0.5rem 0;
        color: #444;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .about-us__list i {
        color: #ff5722;
    }

    main {
        margin-top: 100px;
    }

    .nav__logo-img {
        height: 40px;
        width: auto;
        margin-left: -35px;
    }
</style>
@endsection