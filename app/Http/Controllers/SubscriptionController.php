<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    public function create()
    {
        $mealPlans = MealPlan::all();
        return view('subscriptions.create', compact('mealPlans'));
    }

    public function store(Request $request)
    {
        Log::info('SUBSCRIPTION STORE REQUEST', $request->all());
        $validatedData = $request->validate([
            'plan' => ['required', 'exists:meal_plans,id'],
            'meal_types' => ['required', 'array', 'min:1'],
            'meal_types.*' => ['string'],
            'delivery_days' => ['required', 'array', 'min:1'],
            'delivery_days.*' => ['string'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+62|62|08)[0-9]{8,13}$/'],
        ], [
            'phone.regex' => 'Nomor telepon harus format Indonesia dan hanya angka.'
        ]);

        $mealPlan = \App\Models\MealPlan::findOrFail($request->plan);
        $mealTypesCount = count($request->meal_types);
        $deliveryDaysCount = count($request->delivery_days);
        $totalPrice = $mealPlan->price * $mealTypesCount * $deliveryDaysCount * 4.3;

        $result = \App\Models\Subscription::create([
            'user_id' => auth()->id(),
            'plan_id' => $mealPlan->id,
            'meal_types' => $request->meal_types,
            'delivery_days' => $request->delivery_days,
            'start_date' => $request->start_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'total_price' => $totalPrice,
            'status' => 'active',
        ]);

        Log::info('SUBSCRIPTION CREATED', ['result' => $result]);

        return redirect()->route('user.dashboard')->with('success', 'Langganan berhasil dibuat!');
    }
}
