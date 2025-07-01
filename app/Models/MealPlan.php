<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'full_details',
        'image',
    ];

    public function subscriptions()
    {
        return $this->hasMany(\App\Models\Subscription::class, 'plan_id');
    }
}
