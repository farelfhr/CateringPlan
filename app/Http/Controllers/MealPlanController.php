<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlan;

class MealPlanController extends Controller
{
    public function index()
    {
        $mealPlans = MealPlan::all();
        return view('meal_plans.index', compact('mealPlans'));
    }
}
