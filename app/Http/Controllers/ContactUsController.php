<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Mews\Purifier\Facades\Purifier;

class ContactUsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('status', 'approved')->get();
        return view('contact_us.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'review' => ['required', 'string', 'max:2000'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        // Sanitasi review untuk XSS
        $review = Purifier::clean($request->review);

        Testimonial::create([
            'customer_name' => $request->name,
            'review_message' => $review,
            'rating' => $request->rating,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas testimoni Anda! Testimoni akan direview dan diposting segera.');
    }
}
