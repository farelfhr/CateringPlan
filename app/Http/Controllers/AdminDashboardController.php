<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;
use App\Services\AdminDashboardService;

class AdminDashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(AdminDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $start = $request->input('start_date', now()->startOfMonth());
        $end = $request->input('end_date', now()->endOfMonth());

        $mrr = $this->dashboardService->getMRR($start, $end);
        $reactivations = $this->dashboardService->getReactivations($start, $end);
        $newSubscriptions = $this->dashboardService->getNewSubscriptions($start, $end);
        $subscriptionGrowth = $this->dashboardService->getSubscriptionGrowth();
        $totalSubscriptions = $this->dashboardService->getTotalSubscriptions();
        $pausedSubscriptions = $this->dashboardService->getPausedSubscriptions();
        $cancelledSubscriptions = $this->dashboardService->getCancelledSubscriptions();
        $recentSubscriptions = $this->dashboardService->getRecentSubscriptions(5);

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
