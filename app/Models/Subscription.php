<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'plan_id',
        'meal_types',
        'delivery_days',
        'allergies',
        'total_price',
        'status',
        'pause_start_date',
        'pause_end_date',
        'reactivated_at',
    ];

    protected $casts = [
        'meal_types' => 'array',
        'delivery_days' => 'array',
        'pause_start_date' => 'date',
        'pause_end_date' => 'date',
        'reactivated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mealPlan()
    {
        return $this->belongsTo(MealPlan::class, 'plan_id');
    }
}
