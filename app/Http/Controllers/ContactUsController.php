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
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'review' => ['required', 'string', 'max:2000'],
                'rating' => ['required', 'integer', 'min:1', 'max:5'],
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.max' => 'Nama maksimal 255 karakter.',
                'review.required' => 'Review harus diisi.',
                'review.max' => 'Review maksimal 2000 karakter.',
                'rating.required' => 'Rating harus dipilih.',
                'rating.integer' => 'Rating harus berupa angka.',
                'rating.min' => 'Rating minimal 1 bintang.',
                'rating.max' => 'Rating maksimal 5 bintang.',
            ]);

            // Sanitasi input untuk mencegah XSS
            $sanitizedName = Purifier::clean($validatedData['name']);
            $sanitizedReview = Purifier::clean($validatedData['review']);

            Testimonial::create([
                'customer_name' => $sanitizedName,
                'review_message' => $sanitizedReview,
                'rating' => $validatedData['rating'],
                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Terima kasih atas testimoni Anda! Testimoni akan direview dan diposting segera.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->errors());
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['general' => 'Terjadi kesalahan saat mengirim testimoni. Silakan coba lagi.']);
        }
    }
}
