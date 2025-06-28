<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/meal-plans', [MealPlanController::class, 'index'])->name('meal_plans');

// Subscription routes
Route::get('/subscribe', [SubscriptionController::class, 'create'])->name('subscription');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscription.store');

// Contact and testimonials routes
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact');
Route::post('/testimonials', [ContactUsController::class, 'store'])->name('testimonials.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
