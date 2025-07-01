<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Services\SubscriptionService;

class UserDashboardController extends Controller
{
    public function index()
    {
        $subscriptions = auth()->user()->subscriptions()->with('mealPlan')->get();
        $activeSubscriptionsCount = $subscriptions->where('status', 'active')->count();
        $pausedSubscriptionsCount = $subscriptions->where('status', 'paused')->count();
        $totalSpending = $subscriptions->sum('total_price');

        return view('dashboard.user', compact(
            'subscriptions',
            'activeSubscriptionsCount',
            'pausedSubscriptionsCount',
            'totalSpending'
        ));
    }

    public function pauseSubscription(Request $request, Subscription $subscription, SubscriptionService $service)
    {
        // Authorization: ensure user owns the subscription
        if (auth()->id() !== $subscription->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validateWithBag('pauseSubscription', [
            'pause_start_date' => 'required|date|after:today',
            'pause_end_date' => 'required|date|after:pause_start_date',
        ]);
        
        $service->pause($subscription, $request->pause_start_date, $request->pause_end_date);
        return back()->with('success', 'Subscription paused successfully!');
    }

    public function cancelSubscription(Subscription $subscription)
    {
        // Authorization: ensure user owns the subscription
        if (auth()->id() !== $subscription->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $subscription->update([
            'status' => 'cancelled',
        ]);

        return redirect()->back()->with('success', 'Subscription cancelled successfully!');
    }

    public function reactivateSubscription(Request $request, Subscription $subscription)
    {
        // Authorization: ensure user owns the subscription
        if (auth()->id() !== $subscription->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        if ($subscription->status !== 'paused') {
            return back()->with('error', 'Only paused subscriptions can be reactivated.');
        }
        
        $subscription->update([
            'status' => 'active',
            'reactivated_at' => now(),
            'pause_start_date' => null,
            'pause_end_date' => null,
        ]);
        
        return back()->with('success', 'Subscription reactivated successfully!');
    }
}
