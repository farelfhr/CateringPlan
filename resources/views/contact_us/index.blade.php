@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="max-w-2xl mx-auto">
        <x-card>
            <h1 class="text-2xl font-heading text-brown mb-6 text-center">Contact Us & Testimonials</h1>
            <div class="mb-8 text-center">
                <div class="text-brown font-bold">Our Contact Information</div>
                <div class="mb-1"><span class="font-bold">Manager:</span> Brian</div>
                <div class="mb-4"><span class="font-bold">Phone:</span> 08123456789</div>
            </div>
            <form method="POST" action="{{ route('testimonials.store') }}" class="space-y-6 mb-8">
                @csrf
                <div>
                    <x-label for="name">Your Name</x-label>
                    <x-input name="name" placeholder="Enter your name" required />
                </div>
                <div>
                    <x-label for="review">Your Review</x-label>
                    <textarea id="review" name="review" class="w-full bg-white/80 border-2 border-primary/30 rounded-4xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" rows="3" placeholder="Tell us about your experience with SEA Catering..." required>{{ old('review') }}</textarea>
                </div>
                <div>
                    <x-label for="rating">Rating</x-label>
                    <select id="rating" name="rating" class="w-full bg-white/80 border-2 border-primary/30 rounded-full px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" required>
                        <option value="">Select a rating</option>
                        <option value="5">5 - Excellent</option>
                        <option value="4">4 - Good</option>
                        <option value="3">3 - Average</option>
                        <option value="2">2 - Poor</option>
                        <option value="1">1 - Bad</option>
                    </select>
                </div>
                <x-button type="submit" variant="primary" class="w-full">Submit Testimonial</x-button>
            </form>
            <div>
                <h2 class="font-heading text-lg text-brown mb-2">What Our Customers Say</h2>
                @if($testimonials->isEmpty())
                    <div class="text-gray-500 text-center">No testimonials yet. Be the first to share your experience!</div>
                @else
                    <div class="space-y-4">
                        @foreach($testimonials as $testimonial)
                            <div class="bg-secondary/40 rounded-2xl p-4">
                                <div class="font-bold text-brown mb-1">{{ $testimonial->name }}</div>
                                <div class="text-brown mb-1">{{ $testimonial->review }}</div>
                                <div class="text-accent text-sm">Rating: {{ $testimonial->rating }}/5</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </x-card>
    </div>
</div>
@endsection 