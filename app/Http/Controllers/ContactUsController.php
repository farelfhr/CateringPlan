<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class ContactUsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('contact_us.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'review_message' => ['required', 'string', 'max:2000'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'phone' => ['nullable', 'regex:/^(\\+62|62|08)[0-9]{8,13}$/'],
        ], [
            'phone.regex' => 'Nomor telepon harus format Indonesia dan hanya angka.'
        ]);

        // Sanitasi review_message untuk XSS
        $review = strip_tags($request->review_message);

        Testimonial::create([
            'customer_name' => $request->customer_name,
            'review_message' => $review,
            'rating' => $request->rating,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Thank you for your testimonial! It will be reviewed and posted soon.');
    }
}
