@extends('layouts.app')

@section('content')
<div class="bg-pink-50">
    <!-- Header Section -->
    <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <h1 class="text-6xl font-bold text-pink-700">SEA Catering</h1>
        <p class="text-2xl text-gray-600 mt-4">"Healthy Meals, Anytime, Anywhere"</p>
    </header>

    <!-- Intro Section -->
    <section class="max-w-4xl mx-auto mt-12 p-8 bg-white shadow-lg rounded-lg">
        <p class="text-lg leading-relaxed text-gray-700">
            Welcome to SEA Catering, your go-to service for customizable healthy meal plans delivered all across Indonesia. What started as a small business has grown into a nationwide sensation, and we're committed to bringing you nutritious and delicious food right to your doorstep.
        </p>
    </section>

    <!-- Features Section -->
    <section class="mt-12">
        <h2 class="text-3xl font-semibold text-pink-600 mb-6 text-center">Our Key Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <div class="bg-pink-100 p-6 rounded-lg shadow text-center text-lg font-medium text-pink-800">
                Meal Customization
            </div>
            <div class="bg-pink-100 p-6 rounded-lg shadow text-center text-lg font-medium text-pink-800">
                Delivery to Major Cities Across Indonesia
            </div>
            <div class="bg-pink-100 p-6 rounded-lg shadow text-center text-lg font-medium text-pink-800">
                Detailed Nutritional Information
            </div>
        </div>
    </section>

    <!-- Contact Details Section -->
    <section class="max-w-2xl mx-auto mt-12 p-8 bg-white shadow-lg rounded-lg text-center">
        <h2 class="text-3xl font-semibold text-pink-600 mb-4">Contact Us</h2>
        <p class="text-lg text-gray-700">Manager: Brian</p>
        <p class="text-lg text-gray-700 mt-2">Phone Number: 08123456789</p>
    </section>
</div>
@endsection 