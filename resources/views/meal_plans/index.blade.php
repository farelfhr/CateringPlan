@extends('layouts.app')

@section('content')
<div class="bg-pink-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pink-700 mb-4">Our Delicious Meal Plans</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Choose from our carefully crafted meal plans designed to meet your nutritional needs and lifestyle preferences.
            </p>
        </div>

        <!-- Meal Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto px-4">
            @foreach($mealPlans as $plan)
            <div x-data="{ openModal: false }" class="bg-white p-6 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow duration-300">
                <!-- Meal Plan Image -->
                <div class="h-48 bg-gray-200 mb-4">
                    <img src="{{ $plan->image }}" alt="{{ $plan->name }}" class="w-full h-full object-cover rounded-md">
                </div>
                
                <!-- Meal Plan Content -->
                <h3 class="text-2xl font-semibold text-pink-600 mb-2">{{ $plan->name }}</h3>
                <p class="text-xl font-bold text-gray-800 mb-2">Rp{{ number_format($plan->price, 0, ',', '.') }}</p>
                <p class="text-gray-700 mb-4">{{ $plan->description }}</p>
                
                <!-- Action Buttons -->
                <div class="flex space-x-3">
                    <button class="flex-1 bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors duration-200 font-medium">
                        Order Now
                    </button>
                    <button @click="openModal = true" class="flex-1 bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full transition-colors duration-200">
                        See More Details
                    </button>
                </div>

                <!-- Modal -->
                <div x-show="openModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md mx-auto relative">
                        <button @click="openModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl font-bold">
                            ×
                        </button>
                        
                        <h2 class="text-2xl font-bold text-pink-700 mb-4">{{ $plan->name }} Details</h2>
                        <p class="text-gray-700 mb-4">{{ $plan->full_details }}</p>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-semibold text-green-600">Rp{{ number_format($plan->price, 0, ',', '.') }}</span>
                            <button @click="openModal = false" class="bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors duration-200">
                                Close
                            </button>
                        </div>
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