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
    ];

    protected $casts = [
        'meal_types' => 'array',
        'delivery_days' => 'array',
    ];
}
