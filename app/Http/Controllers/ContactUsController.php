<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class ContactUsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        
        // Add dummy testimonials if none exist for demo
        if ($testimonials->isEmpty()) {
            $testimonials = collect([
                (object) [
                    'id' => 1,
                    'name' => 'Sarah Johnson',
                    'review' => 'SEA Catering benar-benar mengubah kebiasaan makan saya! Makanan sehat yang lezat dan pengiriman tepat waktu. Sangat merekomendasikan!',
                    'rating' => 5,
                    'created_at' => now()->subDays(2)
                ],
                (object) [
                    'id' => 2,
                    'name' => 'Budi Santoso',
                    'review' => 'Kualitas makanan sangat bagus, kemasan rapi dan higienis. Sudah 3 bulan berlangganan dan sangat puas dengan layanannya.',
                    'rating' => 5,
                    'created_at' => now()->subDays(5)
                ],
                (object) [
                    'id' => 3,
                    'name' => 'Diana Putri',
                    'review' => 'Menu vegetarian yang enak dan bergizi. Kemasan lucu dan ramah lingkungan. Terima kasih SEA Catering!',
                    'rating' => 4,
                    'created_at' => now()->subDays(8)
                ],
                (object) [
                    'id' => 4,
                    'name' => 'Ahmad Rizki',
                    'review' => 'Pelayanan customer service sangat ramah dan responsif. Makanan segar dan sesuai dengan informasi nutrisi yang diberikan.',
                    'rating' => 5,
                    'created_at' => now()->subDays(12)
                ],
                (object) [
                    'id' => 5,
                    'name' => 'Maya Sari',
                    'review' => 'Sangat membantu untuk diet sehat saya. Variasi menu yang menarik dan tidak membosankan. Pengiriman selalu tepat waktu!',
                    'rating' => 4,
                    'created_at' => now()->subDays(15)
                ]
            ]);
        }
        
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
        $review = strip_tags($request->review);

        Testimonial::create([
            'customer_name' => $request->name,
            'review_message' => $review,
            'rating' => $request->rating,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas testimoni Anda! Testimoni akan direview dan diposting segera.');
    }
}
