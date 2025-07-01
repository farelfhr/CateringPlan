<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Carbon;

class AdminDashboardService
{
    public function getMRR($start, $end)
    {
        return Subscription::where('status', 'active')
            ->whereBetween('created_at', [$start, $end])
            ->sum('total_price');
    }

    public function getReactivations($start, $end)
    {
        return Subscription::whereNotNull('reactivated_at')
            ->whereBetween('reactivated_at', [$start, $end])
            ->count();
    }

    public function getNewSubscriptions($start, $end)
    {
        return Subscription::whereDate('created_at', '>=', $start)
            ->whereDate('created_at', '<=', $end)
            ->count();
    }

    public function getSubscriptionGrowth()
    {
        return Subscription::where('status', 'active')->count();
    }

    public function getTotalSubscriptions()
    {
        return Subscription::count();
    }

    public function getPausedSubscriptions()
    {
        return Subscription::where('status', 'paused')->count();
    }

    public function getCancelledSubscriptions()
    {
        return Subscription::where('status', 'cancelled')->count();
    }

    public function getRecentSubscriptions($limit = 5)
    {
        return Subscription::with(['user', 'mealPlan'])
            ->latest()
            ->take($limit)
            ->get();
    }
} 