@extends('layouts.app')

@section('content')
<div class="bg-pink-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pink-700 mt-8 mb-10">Contact Us & Testimonials</h1>
        </div>

        <!-- Contact Information Section -->
        <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-lg text-center mb-8">
            <h2 class="text-3xl font-semibold text-pink-600 mb-4">Our Contact Information</h2>
            <p class="text-lg text-gray-700">Manager: Brian</p>
            <p class="text-lg text-gray-700 mt-2">Phone Number: 08123456789</p>
        </div>

        <!-- Testimonial Submission Form -->
        <div class="max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl font-semibold text-pink-600 mt-12 mb-6 text-center">Share Your Experience</h2>
            <form action="/testimonials" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
                @csrf
                <div class="mb-4">
                    <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                    <input type="text" id="customer_name" name="customer_name" required 
                           class="block w-full p-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                </div>
                
                <div class="mb-4">
                    <label for="review_message" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                    <textarea id="review_message" name="review_message" rows="4" required 
                              class="block w-full p-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                              placeholder="Tell us about your experience with SEA Catering..."></textarea>
                </div>
                
                <div class="mb-6">
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <select id="rating" name="rating" required 
                            class="block w-full p-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                        <option value="">Select a rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ (5 stars)</option>
                        <option value="4">⭐⭐⭐⭐ (4 stars)</option>
                        <option value="3">⭐⭐⭐ (3 stars)</option>
                        <option value="2">⭐⭐ (2 stars)</option>
                        <option value="1">⭐ (1 star)</option>
                    </select>
                </div>
                
                <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full w-full transition-colors duration-200">
                    Submit Testimonial
                </button>
            </form>
        </div>

        <!-- Testimonials Carousel -->
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-semibold text-pink-600 mt-12 mb-6 text-center">What Our Customers Say</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $testimonial)
                <div class="bg-pink-50 p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial['rating'])
                                <span class="text-yellow-500 text-xl">&#9733;</span>
                            @else
                                <span class="text-gray-300 text-xl">&#9734;</span>
                            @endif
                        @endfor
                    </div>
                    <p class="italic text-gray-700 mt-2 mb-4">"{{ $testimonial['review'] }}"</p>
                    <p class="font-semibold text-pink-800">{{ $testimonial['name'] }}</p>
                    <p class="text-sm text-gray-500">({{ $testimonial['rating'] }}/5 stars)</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Additional Contact Information -->
        <div class="max-w-2xl mx-auto mt-12 p-8 bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-pink-700 mb-6 text-center">Get In Touch</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="text-center">
                    <h3 class="font-semibold text-gray-800 mb-2">Service Areas</h3>
                    <p class="text-gray-600">Major cities across Indonesia</p>
                </div>
                <div class="text-center">
                    <h3 class="font-semibold text-gray-800 mb-2">Business Hours</h3>
                    <p class="text-gray-600">Monday - Sunday<br>8:00 AM - 8:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 