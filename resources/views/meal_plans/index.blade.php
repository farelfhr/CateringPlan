@extends('layouts.app')

@section('content')
<div class="bg-pink-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pink-700 mb-4">Our Meal Plans</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Choose from our carefully crafted meal plans designed to meet your nutritional needs and lifestyle preferences.
            </p>
        </div>

        <!-- Meal Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($mealPlans as $mealPlan)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <!-- Meal Plan Image -->
                <div class="h-48 bg-gray-200">
                    <img src="{{ $mealPlan['image'] }}" alt="{{ $mealPlan['name'] }}" class="w-full h-full object-cover">
                </div>
                
                <!-- Meal Plan Content -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-2xl font-bold text-pink-700">{{ $mealPlan['name'] }}</h3>
                        <span class="text-xl font-semibold text-green-600">{{ $mealPlan['price'] }}</span>
                    </div>
                    
                    <p class="text-gray-600 mb-4">{{ $mealPlan['description'] }}</p>
                    
                    <div class="space-y-3">
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $mealPlan['full_details'] }}</p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="mt-6 flex space-x-3">
                        <button class="flex-1 bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors duration-200 font-medium">
                            Order Now
                        </button>
                        <button class="flex-1 border border-pink-600 text-pink-600 py-2 px-4 rounded-lg hover:bg-pink-50 transition-colors duration-200 font-medium">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-12">
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-pink-700 mb-4">Ready to Start Your Healthy Journey?</h2>
                <p class="text-gray-600 mb-6">
                    Contact us today to customize your meal plan or learn more about our subscription options.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="bg-pink-600 text-white py-3 px-6 rounded-lg hover:bg-pink-700 transition-colors duration-200 font-medium">
                        Contact Us
                    </a>
                    <a href="{{ route('subscription') }}" class="border border-pink-600 text-pink-600 py-3 px-6 rounded-lg hover:bg-pink-50 transition-colors duration-200 font-medium">
                        View Subscriptions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 