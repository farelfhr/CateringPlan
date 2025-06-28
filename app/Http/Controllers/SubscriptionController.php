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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^(\+62|0)\d{9,13}$/'],
            'plan_id' => ['required', 'exists:meal_plans,id'],
            'meal_types' => ['required', 'array', 'min:1'],
            'meal_types.*' => ['in:Breakfast,Lunch,Dinner'],
            'delivery_days' => ['required', 'array', 'min:1'],
            'delivery_days.*' => ['in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday'],
            'allergies' => ['nullable', 'string', 'max:1000'],
        ]);

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
            'allergies' => $request->allergies,
            'total_price' => $totalPrice,
            'status' => 'active',
        ]);

        return redirect()->route('subscription')->with('success', 'Subscription created successfully! Your total price is Rp' . number_format($totalPrice, 0, ',', '.'));
    }
}
