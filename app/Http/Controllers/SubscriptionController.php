<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function create()
    {
        $mealPlans = MealPlan::all();
        return view('subscriptions.create', compact('mealPlans'));
    }

    public function store(Request $request)
    {
        try {
            // Cek jika user sudah punya langganan aktif
            $existingActive = \App\Models\Subscription::where('user_id', Auth::id())
                ->where('status', 'active')
                ->first();
            if ($existingActive) {
                return back()->with('error', 'Anda sudah memiliki langganan aktif. Silakan batalkan atau pause langganan Anda sebelum membuat yang baru.')->withInput();
            }

            Log::info('SUBSCRIPTION STORE REQUEST', $request->all());
            $validatedData = $request->validate([
                'plan' => ['required', 'exists:meal_plans,id'],
                'meal_types' => ['required', 'array', 'min:1'],
                'meal_types.*' => ['string', 'in:Breakfast,Lunch,Dinner'],
                'delivery_days' => ['required', 'array', 'min:1'],
                'delivery_days.*' => ['string'],
                'start_date' => ['required', 'date', 'after_or_equal:today'],
                'address' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'regex:/^(\+62|62|08)[0-9]{8,13}$/'],
                'allergies' => ['nullable', 'string'],
            ], [
                'phone.regex' => 'Nomor telepon harus format Indonesia dan hanya angka.'
            ]);

            $mealPlan = \App\Models\MealPlan::findOrFail($request->plan);
            $mealTypesCount = count($request->meal_types);
            $deliveryDaysCount = count($request->delivery_days);
            $totalPrice = $mealPlan->price * $mealTypesCount * $deliveryDaysCount * 4.3;

            $result = \App\Models\Subscription::create([
                'user_id' => Auth::id(),
                'name' => Auth::user()->name,
                'plan_id' => $mealPlan->id,
                'meal_types' => $request->meal_types,
                'delivery_days' => $request->delivery_days,
                'start_date' => $request->start_date,
                'address' => $request->address,
                'phone' => $request->phone,
                'allergies' => $request->allergies,
                'total_price' => $totalPrice,
                'status' => 'active',
            ]);

            Log::info('SUBSCRIPTION CREATED', ['result' => $result]);

            return redirect()->route('user.dashboard')->with('success', 'Langganan berhasil dibuat!');
        } catch (\Exception $e) {
            Log::error('SUBSCRIPTION ERROR', ['error' => $e->getMessage()]);
            return back()->with('error', 'Terjadi kesalahan pada server atau database. Silakan coba lagi nanti.')->withInput();
        }
    }
}
