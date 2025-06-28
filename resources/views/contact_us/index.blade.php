@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="section-title gradient-text">Contact Us & Testimonials</h1>
        </div>

        <!-- Contact Information Section -->
        <div class="subscription-card max-w-2xl mx-auto text-center mb-8">
            <h2 class="section-title">Our Contact Information</h2>
            <div class="space-y-3">
                <p class="text-lg text-navy"><span class="font-bold">Manager:</span> Brian</p>
                <p class="text-lg text-navy"><span class="font-bold">Phone:</span> 08123456789</p>
            </div>
        </div>

        <!-- Testimonial Submission Form -->
        <div class="max-w-2xl mx-auto mb-12">
            <h2 class="section-title">Share Your Experience</h2>
            <form action="{{ route('testimonials.store') }}" method="POST" class="card">
                @csrf
                <div class="mb-6">
                    <label for="customer_name" class="form-label">Your Name</label>
                    <input type="text" id="customer_name" name="customer_name" required class="input-field @error('customer_name') border-red-400 @enderror" value="{{ old('customer_name') }}" placeholder="Enter your name">
                    @error('customer_name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="review_message" class="form-label">Your Review</label>
                    <textarea id="review_message" name="review_message" rows="4" required class="input-field @error('review_message') border-red-400 @enderror" placeholder="Tell us about your experience with SEA Catering...">{{ old('review_message') }}</textarea>
                    @error('review_message')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="rating" class="form-label">Rating</label>
                    <select id="rating" name="rating" required class="input-field @error('rating') border-red-400 @enderror">
                        <option value="">Select a rating</option>
                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 (Excellent)</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 (Good)</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 (Average)</option>
                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 (Below Average)</option>
                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 (Poor)</option>
                    </select>
                    @error('rating')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn-primary w-full">Submit Testimonial</button>
            </form>
        </div>

        <!-- Testimonials Slider -->
        <div class="max-w-2xl mx-auto mb-12" x-data="{
            active: 0,
            testimonials: @json($testimonials),
            next() { this.active = (this.active + 1) % this.testimonials.length },
            prev() { this.active = (this.active - 1 + this.testimonials.length) % this.testimonials.length }
        }">
            <h2 class="section-title">What Our Customers Say</h2>
            <template x-if="testimonials.length > 0">
                <div class="relative">
                    <template x-for="(t, i) in testimonials" :key="i">
                        <div x-show="active === i" class="card text-center transition-all duration-500">
                            <p class="text-lg italic text-navy mb-2" x-text="t.review_message"></p>
                            <div class="flex justify-center mb-2">
                                <template x-for="star in 5">
                                    <span :class="star <= t.rating ? 'text-rose' : 'text-cream'">&#9733;</span>
                                </template>
                            </div>
                            <p class="font-bold text-navy" x-text="t.customer_name"></p>
                        </div>
                    </template>
                    <button @click="prev" class="absolute left-0 top-1/2 -translate-y-1/2 bg-cream px-3 py-1 rounded-full shadow">&#8249;</button>
                    <button @click="next" class="absolute right-0 top-1/2 -translate-y-1/2 bg-cream px-3 py-1 rounded-full shadow">&#8250;</button>
                </div>
            </template>
            <template x-if="testimonials.length === 0">
                <div class="text-center py-8">
                    <p class="text-navy">No testimonials yet. Be the first to share your experience!</p>
                </div>
            </template>
        </div>

        <!-- Additional Contact Information -->
        <div class="subscription-card max-w-2xl mx-auto mt-12">
            <h2 class="section-title">Get In Touch</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="feature-card text-center">
                    <h3 class="font-heading text-navy mb-2">Service Areas</h3>
                    <p class="text-navy">Major cities across Indonesia</p>
                </div>
                <div class="feature-card text-center">
                    <h3 class="font-heading text-navy mb-2">Business Hours</h3>
                    <p class="text-navy">Monday - Sunday<br>8:00 AM - 8:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 