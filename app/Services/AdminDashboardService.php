<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\User;
use App\Models\MealPlan;

class AdminDashboardService
{
    /**
     * Hitung jumlah reaktivasi langganan yang statusnya masih aktif dalam rentang tanggal tertentu.
     *
     * @param  string  $start  Format: 'Y-m-d' atau Carbon
     * @param  string  $end    Format: 'Y-m-d' atau Carbon
     * @return int
     */
    public function getReactivations($start, $end)
    {
        return Subscription::where('status', 'active')
            ->whereNotNull('reactivated_at')
            ->whereBetween('reactivated_at', [$start, $end])
            ->count();
    }

    /**
     * Dapatkan pengguna dengan jumlah langganan terbanyak.
     */
    public function getTopSubscribingUsers($limit = 5)
    {
        return User::withCount('subscriptions')
            ->orderBy('subscriptions_count', 'desc')
            ->take($limit)
            ->get();
    }

    /**
     * Dapatkan paket makanan yang paling sering dipesan.
     */
    public function getPopularMealPlans($limit = 3)
    {
        return MealPlan::withCount('subscriptions')
            ->orderBy('subscriptions_count', 'desc')
            ->take($limit)
            ->get();
    }

    /**
     * Hitung MRR dengan filter plan opsional.
     */
    public function getMRR($start, $end, $planId = null)
    {
        $query = Subscription::where('status', 'active')
            ->whereBetween('created_at', [$start, $end]);
        if (!empty($planId)) {
            $query->where('plan_id', $planId);
        }
        return $query->sum('total_price');
    }

    /**
     * Hitung jumlah langganan baru dengan filter plan opsional.
     */
    public function getNewSubscriptions($start, $end, $planId = null)
    {
        $query = Subscription::whereDate('created_at', '>=', $start)
            ->whereDate('created_at', '<=', $end);
        if (!empty($planId)) {
            $query->where('plan_id', $planId);
        }
        return $query->count();
    }

    public function getActiveSubscriptions($planId = null)
    {
        $query = Subscription::where('status', 'active');
        if (!empty($planId)) {
            $query->where('plan_id', $planId);
        }
        return $query->count();
    }

    public function getPausedSubscriptions($planId = null)
    {
        $query = Subscription::where('status', 'paused');
        if (!empty($planId)) {
            $query->where('plan_id', $planId);
        }
        return $query->count();
    }

    public function getCancelledSubscriptions($planId = null)
    {
        $query = Subscription::where('status', 'cancelled');
        if (!empty($planId)) {
            $query->where('plan_id', $planId);
        }
        return $query->count();
    }

    public function getTotalSubscriptions($planId = null)
    {
        $query = Subscription::query();
        if (!empty($planId)) {
            $query->where('plan_id', $planId);
        }
        return $query->count();
    }

    public function getRecentSubscriptions($limit = 5, $planId = null)
    {
        $query = Subscription::with(['user', 'mealPlan'])->latest();
        if (!empty($planId)) {
            $query->where('plan_id', $planId);
        }
        return $query->take($limit)->get();
    }
} 