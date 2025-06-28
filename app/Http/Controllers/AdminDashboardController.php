<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get date range from request or default to current month
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

        // Calculate metrics
        $newSubscriptions = Subscription::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->count();

        $mrr = Subscription::where('status', 'active')->sum('total_price');

        $reactivations = Subscription::where('status', 'active')
            ->whereNotNull('reactivated_at')
            ->whereDate('reactivated_at', '>=', $startDate)
            ->whereDate('reactivated_at', '<=', $endDate)
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
            'startDate',
            'endDate'
        ));
    }
}
