@extends('layouts.layout')

  @section('css')
  <!-- Link to the main stylesheet -->
  <link rel="stylesheet" href="{{ url('/css/support.css') }}">
  <!-- Remixicon for icons used on the page - GPT assistance -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  @endsection

  @section('title')
  <title>FAQ - GAMERHUB</title>
  @endsection

@section('content')
  <!-- Top Section for Product Info -->
  <section class="faq-top-section">
    <div class="faq-product-info">
      <!-- Placeholder for dynamic product image -->
      <img id="product-image" src="" alt="Product Image">
      <!-- Placeholder for dynamic product title -->
      <h1 id="product-title">Product Name</h1>
    </div>
  </section>

  <!-- Main FAQ Section -->
  <section class="faq-section">
    <h1 class="faq-title">Frequently Asked Questions</h1>
    <!-- FAQ list will be dynamically generated here -->
    <div id="faq-list" class="faq-list"></div>
  </section>

  <!-- Contact Us Prompt Section -->
  <section class="contact-prompt">
    <h1>Still need help?</h1>
    <p>If your question isn’t answered in the FAQs, feel free to contact us.</p>
    <!-- Link to the contact page -->
    <a href="{{ url('/contact') }}" class="contact-link">Contact Us</a>
  </section>

  <!-- FAQ JavaScript File -->
  <script src="{{ url('/js/faq.js') }}"></script>
@endsection