<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $testimonials = [
            ['name' => 'Alice S.', 'review' => 'SEA Catering transformed my diet! Healthy and delicious.', 'rating' => 5],
            ['name' => 'Bob M.', 'review' => 'Great variety and timely delivery. Highly recommend!', 'rating' => 4],
            ['name' => 'Charlie D.', 'review' => 'Customizable meals are a game-changer for my allergies.', 'rating' => 5],
        ];
        return view('contact_us.index', compact('testimonials'));
    }
}
