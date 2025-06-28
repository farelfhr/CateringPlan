@extends('layouts.app')

@section('content')
<div class="bg-pink-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-pink-700 mb-4">Subscription Plans</h1>
            <p class="text-xl text-gray-600 mb-8">
                Choose a subscription plan that fits your lifestyle and dietary needs.
            </p>
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto">
                <p class="text-gray-600">Subscription features coming soon...</p>
                <a href="{{ route('home') }}" class="inline-block mt-6 bg-pink-600 text-white py-3 px-6 rounded-lg hover:bg-pink-700 transition-colors duration-200 font-medium">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 