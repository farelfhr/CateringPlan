<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/meal-plans', [MealPlanController::class, 'index'])->name('meal_plans');

// Contact and testimonials routes (public)
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact');
Route::post('/testimonials', [ContactUsController::class, 'store'])->name('testimonials.store');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/subscribe', function () {
        $mealPlans = \App\Models\MealPlan::all();
        return view('subscriptions.subscribe', compact('mealPlans'));
    })->name('subscription');
    Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscription.store');
    
    // Alternative route for subscription creation
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscription.create');
    
    // User Dashboard routes
    Route::get('/dashboard/user', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('/subscriptions/{subscription}/pause', [App\Http\Controllers\UserDashboardController::class, 'pauseSubscription'])->name('subscription.pause');
    Route::post('/subscriptions/{subscription}/cancel', [App\Http\Controllers\UserDashboardController::class, 'cancelSubscription'])->name('subscription.cancel');
    Route::post('/subscriptions/{subscription}/reactivate', [App\Http\Controllers\UserDashboardController::class, 'reactivateSubscription'])->name('subscription.reactivate');
    
    // Add other authenticated routes here later for User Dashboard
});

// Admin routes
Route::middleware(['auth', 'can:access-admin-dashboard'])->group(function () {
    Route::get('/dashboard/admin', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
