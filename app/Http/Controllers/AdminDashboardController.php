<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->input('start_date', now()->startOfMonth());
        $end = $request->input('end_date', now()->endOfMonth());
        // MRR: Total harga subscription aktif yang dibuat/berlaku di periode ini
        $mrr = Subscription::where('status', 'active')
            ->whereBetween('created_at', [$start, $end])
            ->sum('total_price');
        // Reactivations: Jumlah subscription yang diaktifkan ulang di periode ini
        $reactivations = Subscription::whereNotNull('reactivated_at')
            ->whereBetween('reactivated_at', [$start, $end])
            ->count();

        // Calculate metrics
        $newSubscriptions = Subscription::whereDate('created_at', '>=', $start)
            ->whereDate('created_at', '<=', $end)
            ->count();

        $subscriptionGrowth = Subscription::where('status', 'active')->count();

        // Additional metrics
        $totalSubscriptions = Subscription::count();
        $pausedSubscriptions = Subscription::where('status', 'paused')->count();
        $cancelledSubscriptions = Subscription::where('status', 'cancelled')->count();

        // Recent subscriptions for display
        $recentSubscriptions = Subscription::with(['user', 'mealPlan'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.admin', compact(
            'newSubscriptions',
            'mrr',
            'reactivations',
            'subscriptionGrowth',
            'totalSubscriptions',
            'pausedSubscriptions',
            'cancelledSubscriptions',
            'recentSubscriptions',
            'start',
            'end'
        ));
    }
}
