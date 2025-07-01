@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Testimonial Management</h2>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if($testimonials->isEmpty())
        <div class="text-gray-600">No testimonials found.</div>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Customer Name</th>
                    <th class="py-2 px-4 border-b">Review</th>
                    <th class="py-2 px-4 border-b">Rating</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $testimonial->customer_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $testimonial->review_message }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $testimonial->rating }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <span class="inline-block px-2 py-1 rounded {{ $testimonial->status == 'approved' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                            {{ ucfirst($testimonial->status) }}
                        </span>
                    </td>
                    <td class="py-2 px-4 border-b text-center">
                        @if($testimonial->status !== 'approved')
                        <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mr-2">Approve</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection 