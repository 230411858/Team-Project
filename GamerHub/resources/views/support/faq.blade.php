@extends('layouts.layout')


@section('css')
<link rel="stylesheet" href="{{ url('/css/faq.css') }}">
@endsection

@section('title')

@endsection

@section('content')
  <!-- Main FAQ Section -->
  <section class="faq-section">
    <h1 class="faq-title">Frequently Asked Questions</h1>
    <!-- Static FAQ list -->
  <div class="faq-list">
    
    <!-- 1. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        Do you accept refunds?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>Yes. We have a 30-day refund policy. Please contact support to initiate a return.</p>
      </div>
    </div>

    <!-- 2. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        How long does shipping take?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>Standard shipping takes 5-7 business days, while expedited shipping takes 2-3 days.</p>
      </div>
    </div>

    <!-- 3. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        Which payment methods do you accept?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>We accept all major credit cards as well as PayPal.</p>
      </div>
    </div>

    <!-- 4. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        Do you ship internationally?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>Yes, we ship worldwide. Shipping fees and times vary by region.</p>
      </div>
    </div>

    <!-- 5. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        Is there a warranty on your products?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>All products come with a one-year limited warranty against manufacturing defects.</p>
      </div>
    </div>

    <!-- 6. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        How can I track my order?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>You will receive a tracking number via email once your order ships.</p>
      </div>
    </div>

    <!-- 7. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        Can I change my order after placing it?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>Contact our support team as soon as possible. If your order hasn’t shipped, we can modify it.</p>
      </div>
    </div>

    <!-- 8. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        What should I do if my product is defective?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>Please contact our support with photos or video of the defect. We will replace or refund.</p>
      </div>
    </div>

    <!-- 9. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        Do you offer gift wrapping?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>Not currently unfortunately,but we can put a custom note in each order if requested</p>
      </div>
    </div>

    <!-- 10. FAQ item -->
    <div class="faq-item">
      <button class="faq-question">
        How can I contact customer service?
        <i class="ri-arrow-down-s-line arrow-icon"></i>
      </button>
      <div class="faq-answer">
        <p>You can reach us via email, phone, or live chat. See our Contact page for details.</p>
      </div>
    </div>

  </div>
</section>
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
@endsection

@section('js')
  <!-- FAQ JavaScript File -->
  <script src="{{ url('/js/faq.js') }}"></script>
@endsection
