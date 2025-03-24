@extends('layouts.layout')

@section('css')
    <!-- CSS Styling for the Page -->
    <link rel="stylesheet" href="{{ url('/css/contact.css') }}">
    <style>
        .box-sizing {
            box-sizing: border-box;
        }

        /* /* Main contact section stuff  */
        .contact-section {
            max-width: 800px; 
            margin: 3rem auto;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border-radius: 10px; 
            resize: none;
            
        }

        .contact-header {
            text-align: center; 
            margin-bottom: 2rem; 
        }

        .contact-header h2 {
            font-size: 2.5rem; 
            color: #8bc8f7; 
        }

        .form-group {
            margin-bottom: 1.5rem; 
        }

        .contact-section label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 0.5rem;
        }

        .contact-section input,
        .contact-section select,
        .contact-section textarea {
            width: 95%; 
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px; 
            font-size: 1rem;
            resize: none;
            display: block;
            box-sizing: border-box;
        }

        .contact-section textarea {
            height: 120px; /* Give it  room for big messages */
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #ff6661; 
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #ec5b5b; 
        }

        @media (max-width: 768px) {
            .contact-header h2 {
                font-size: 2rem; /* Smaller headline for mobile */
            }

            .submit-btn {
                font-size: 1rem;
                padding: 0.8rem;
            }
        }

        #contact-form {
            all: initial;
        }
    </style>
@endsection

@section('title')
    <title>Contact Us | GamerHub</title>
@endsection

@section('content')
<!-- https://stackoverflow.com/questions/30374863/why-use-rem-instead-px-when-its-the-same-anyway -->
<!-- implemented usage of rem as easier for future accessibility endevours - Jayden mentioned and I implemented -->
    <!-- Logo section -->
 

    <!-- Contact Us form -->
    <section class="contact-section">
        <div class="contact-header">
            <h2>Contact Us</h2>
            <p>Have a question or need assistance? Get in touch with us!</p>
        </div>
        <!-- This is where users fill out their info -->
        <form id="contact-form">
            <div class="form-group">
                <label for="form-name">Full Name <span class="required">*</span></label>
                <input type="text" id="from-name" name="from-name" required placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label for="from-email">Email <span class="required">*</span></label>
                <input type="email" id="from-email" name="from-email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="country">Country <span class="required">*</span></label>
                <select id="country" name="country" required>
                    <option value="" disabled selected>Select Your Country</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message <span class="required">*</span></label>
                <textarea id="message" name="message" required placeholder="Enter your message"></textarea>
            </div>
            <!-- Submit button to send the email -->
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </section>
    <br>
@endsection

@section('js')
    <!-- Script to handle email sending -->
    <script src="{{ url('/js/contact.js') }}"></script>
        <!-- EmailJS Setup for Sending Emails -->
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3.11.0/dist/email.min.js"></script>
    <script>
        // Initialize EmailJS - Replace with ID from emailjs website
        emailjs.init("l_sqHPwRue0BZ7XSc");
    </script>
@endsection
