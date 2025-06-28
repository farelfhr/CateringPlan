<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlan;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function create()
    {
        $mealPlans = MealPlan::all();
        return view('subscriptions.create', compact('mealPlans'));
    }

    public function store(Request $request)
    {
        // Validate the request with enhanced validation rules
        $validatedData = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'meal_plan_id' => ['required', 'exists:meal_plans,id'],
            'password' => [
                'required', 'string', 'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'phone' => ['required', 'regex:/^(\\+62|62|08)[0-9]{8,13}$/'],
            'plan_id' => ['required', 'exists:meal_plans,id'],
            'meal_types' => ['required', 'array', 'min:1'],
            'meal_types.*' => ['in:Breakfast,Lunch,Dinner'],
            'delivery_days' => ['required', 'array', 'min:1'],
            'delivery_days.*' => ['in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday'],
            'allergies' => ['nullable', 'string', 'max:1000'],
        ], [
            'password.regex' => 'Password harus mengandung huruf besar, kecil, angka, dan karakter spesial.',
            'phone.regex' => 'Nomor telepon harus format Indonesia dan hanya angka.'
        ]);

        // Sanitasi input bebas user (misal allergies)
        $allergies = strip_tags($request->input('allergies'));

        // Get the selected meal plan
        $mealPlan = MealPlan::findOrFail($request->plan_id);
        
        // Calculate total price
        $mealTypesCount = count($request->meal_types);
        $deliveryDaysCount = count($request->delivery_days);
        $totalPrice = $mealPlan->price * $mealTypesCount * $deliveryDaysCount * 4.3;

        // Create subscription with user_id
        Subscription::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'plan_id' => $request->plan_id,
            'meal_types' => $request->meal_types,
            'delivery_days' => $request->delivery_days,
            'allergies' => $allergies,
            'total_price' => $totalPrice,
            'status' => 'active',
        ]);

        return redirect()->route('subscription')->with('success', 'Subscription created successfully! Your total price is Rp' . number_format($totalPrice, 0, ',', '.'));
    }
}
