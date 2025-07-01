<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminDashboardService;
use App\Models\MealPlan;

class AdminDashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(AdminDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $start = $request->input('start_date') ?: now()->startOfMonth();
        $end = $request->input('end_date') ?: now()->endOfMonth();
        $planId = $request->filled('plan_id') && $request->input('plan_id') !== '' ? $request->input('plan_id') : null;

        $mrr = $this->dashboardService->getMRR($start, $end, $planId);
        $newSubscriptions = $this->dashboardService->getNewSubscriptions($start, $end, $planId);
        $reactivations = $this->dashboardService->getReactivations($start, $end);
        $subscriptionGrowth = $this->dashboardService->getActiveSubscriptions($planId);
        $totalSubscriptions = $this->dashboardService->getTotalSubscriptions($planId);
        $pausedSubscriptions = $this->dashboardService->getPausedSubscriptions($planId);
        $cancelledSubscriptions = $this->dashboardService->getCancelledSubscriptions($planId);
        $recentSubscriptions = $this->dashboardService->getRecentSubscriptions(5, $planId);

        $topUsers = $this->dashboardService->getTopSubscribingUsers();
        $popularPlans = $this->dashboardService->getPopularMealPlans();
        $allMealPlans = MealPlan::all();

        $adminActiveCount = $this->dashboardService->getActiveSubscriptions($planId);
        $adminPausedCount = $this->dashboardService->getPausedSubscriptions($planId);
        $adminTotalSpending = \App\Models\Subscription::sum('total_price');

        $adminSubscriptions = auth()->user()->subscriptions()->with('mealPlan')->get();

        return view('dashboard.admin', compact(
            'mrr', 'newSubscriptions', 'reactivations',
            'subscriptionGrowth', 'totalSubscriptions', 'pausedSubscriptions', 'cancelledSubscriptions',
            'recentSubscriptions',
            'topUsers', 'popularPlans', 'allMealPlans', 'start', 'end', 'planId',
            'adminActiveCount', 'adminPausedCount', 'adminTotalSpending', 'adminSubscriptions'
        ));
    }
}
