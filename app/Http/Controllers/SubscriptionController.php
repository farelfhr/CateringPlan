<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        Log::info('SUBSCRIPTION STORE REQUEST', $request->all());
        
        try {
            // Check if user already has an active subscription
            $existingSubscription = Subscription::where('user_id', Auth::id())
                ->where('status', 'active')
                ->first();
            
            if ($existingSubscription) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['general' => 'Anda sudah memiliki langganan aktif. Silakan batalkan langganan yang ada terlebih dahulu.']);
            }

            $validatedData = $request->validate([
                'plan' => ['required', 'exists:meal_plans,id'],
                'meal_types' => ['required', 'array', 'min:1'],
                'meal_types.*' => ['string', 'in:Sarapan,Makan Siang,Makan Malam,Snack'],
                'delivery_days' => ['required', 'array', 'min:1'],
                'delivery_days.*' => ['string', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'],
                'start_date' => ['required', 'date', 'after_or_equal:today'],
                'address' => ['required', 'string', 'max:500'],
                'phone' => ['required', 'regex:/^(\+62|62|08)[0-9]{8,13}$/'],
                'allergies' => ['nullable', 'string', 'max:1000'],
            ], [
                'plan.required' => 'Silakan pilih meal plan.',
                'plan.exists' => 'Meal plan yang dipilih tidak valid.',
                'meal_types.required' => 'Silakan pilih minimal satu tipe makanan.',
                'meal_types.min' => 'Silakan pilih minimal satu tipe makanan.',
                'meal_types.*.in' => 'Tipe makanan yang dipilih tidak valid.',
                'delivery_days.required' => 'Silakan pilih minimal satu hari pengiriman.',
                'delivery_days.min' => 'Silakan pilih minimal satu hari pengiriman.',
                'delivery_days.*.in' => 'Hari pengiriman yang dipilih tidak valid.',
                'start_date.required' => 'Tanggal mulai harus diisi.',
                'start_date.date' => 'Format tanggal tidak valid.',
                'start_date.after_or_equal' => 'Tanggal mulai tidak boleh kurang dari hari ini.',
                'address.required' => 'Alamat pengiriman harus diisi.',
                'address.max' => 'Alamat pengiriman maksimal 500 karakter.',
                'phone.required' => 'Nomor telepon harus diisi.',
                'phone.regex' => 'Nomor telepon harus format Indonesia yang valid (contoh: 08123456789).',
                'allergies.max' => 'Informasi alergi maksimal 1000 karakter.',
            ]);

            // Sanitasi input untuk mencegah XSS
            $sanitizedAddress = Purifier::clean($validatedData['address']);
            $sanitizedAllergies = $validatedData['allergies'] ? Purifier::clean($validatedData['allergies']) : null;

            $mealPlan = \App\Models\MealPlan::findOrFail($validatedData['plan']);
            $mealTypesCount = count($validatedData['meal_types']);
            $deliveryDaysCount = count($validatedData['delivery_days']);
            $totalPrice = $mealPlan->price * $mealTypesCount * $deliveryDaysCount * 4.3;

            // Use database transaction to ensure data consistency
            DB::beginTransaction();
            
            $subscription = \App\Models\Subscription::create([
                'user_id' => Auth::id(),
                'name' => Auth::user()->name,
                'plan_id' => $mealPlan->id,
                'meal_types' => $validatedData['meal_types'],
                'delivery_days' => $validatedData['delivery_days'],
                'start_date' => $validatedData['start_date'],
                'address' => $sanitizedAddress,
                'phone' => $validatedData['phone'],
                'allergies' => $sanitizedAllergies,
                'total_price' => $totalPrice,
                'status' => 'active',
            ]);

            DB::commit();
            
            Log::info('SUBSCRIPTION CREATED SUCCESSFULLY', [
                'subscription_id' => $subscription->id,
                'user_id' => Auth::id(),
                'total_price' => $totalPrice
            ]);

            return redirect()->route('user.dashboard')->with('success', 'Langganan berhasil dibuat! Anda akan segera menerima konfirmasi melalui email.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('SUBSCRIPTION VALIDATION FAILED', [
                'user_id' => Auth::id(),
                'errors' => $e->errors(),
                'input' => $request->except(['_token'])
            ]);
            
            return redirect()->back()
                ->withInput()
                ->withErrors($e->errors());
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('SUBSCRIPTION CREATION FAILED', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->except(['_token'])
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['general' => 'Terjadi kesalahan saat membuat langganan. Silakan coba lagi.']);
        }
    }
}
