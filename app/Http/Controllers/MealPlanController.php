<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index()
    {
        $mealPlans = [
            [
                'name' => 'Diet Plan',
                'price' => 'Rp30.000,00',
                'description' => 'Light and balanced meals for weight management.',
                'full_details' => 'Our Diet Plan focuses on low-calorie, high-nutrient meals designed to support your weight loss journey without sacrificing flavor. Includes fresh vegetables, lean proteins, and complex carbohydrates.',
                'image' => 'https://via.placeholder.com/300x200/FFD1DC/FF69B4?text=Diet+Plan'
            ],
            [
                'name' => 'Protein Plan',
                'price' => 'Rp40.000,00',
                'description' => 'High-protein meals for muscle building and energy.',
                'full_details' => 'The Protein Plan is packed with essential amino acids to fuel your muscles and keep you energized. Perfect for athletes or anyone looking to increase their protein intake. Features premium meats, fish, and plant-based protein sources.',
                'image' => 'https://via.placeholder.com/300x200/B0E0E6/87CEEB?text=Protein+Plan'
            ],
            [
                'name' => 'Royal Plan',
                'price' => 'Rp60.000,00',
                'description' => 'Premium, gourmet meals for a luxurious dining experience.',
                'full_details' => 'Indulge in our Royal Plan, offering an exquisite selection of gourmet meals prepared with the finest ingredients. Experience culinary excellence with every bite. Ideal for those who appreciate high-quality dining.',
                'image' => 'https://via.placeholder.com/300x200/F0FFF0/90EE90?text=Royal+Plan'
            ]
        ];
        
        return view('meal_plans.index', compact('mealPlans'));
    }
}
