<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MealPlan;

class MealPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MealPlan::create([
            'name' => 'Diet Plan',
            'price' => 30000,
            'description' => 'Light and balanced meals for weight management.',
            'full_details' => 'Our Diet Plan focuses on low-calorie, high-nutrient meals designed to support your weight loss journey without sacrificing flavor. Includes fresh vegetables, lean proteins, and complex carbohydrates.',
            'image' => 'https://via.placeholder.com/300x200/FFD1DC/FF69B4?text=Diet+Plan'
        ]);
        
        MealPlan::create([
            'name' => 'Protein Plan',
            'price' => 40000,
            'description' => 'High-protein meals for muscle building and energy.',
            'full_details' => 'The Protein Plan is packed with essential amino acids to fuel your muscles and keep you energized. Perfect for athletes or anyone looking to increase their protein intake. Features premium meats, fish, and plant-based protein sources.',
            'image' => 'https://via.placeholder.com/300x200/B0E0E6/87CEEB?text=Protein+Plan'
        ]);
        
        MealPlan::create([
            'name' => 'Royal Plan',
            'price' => 60000,
            'description' => 'Premium, gourmet meals for a luxurious dining experience.',
            'full_details' => 'Indulge in our Royal Plan, offering an exquisite selection of gourmet meals prepared with the finest ingredients. Experience culinary excellence with every bite. Ideal for those who appreciate high-quality dining.',
            'image' => 'https://via.placeholder.com/300x200/F0FFF0/90EE90?text=Royal+Plan'
        ]);
    }
}
