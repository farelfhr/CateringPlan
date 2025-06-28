@extends('layouts.app')

@section('content')
<div class="bg-pink-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pink-700 mb-4">Contact Us</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Get in touch with us to learn more about our services or to place an order.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-pink-700 mb-6">Get In Touch</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="font-semibold text-gray-800">Manager</h3>
                        <p class="text-gray-600">Brian</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Phone Number</h3>
                        <p class="text-gray-600">08123456789</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Service Areas</h3>
                        <p class="text-gray-600">Major cities across Indonesia</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-pink-700 mb-6">Send us a Message</h2>
                <form class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-pink-600 text-white py-3 px-6 rounded-lg hover:bg-pink-700 transition-colors duration-200 font-medium">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 