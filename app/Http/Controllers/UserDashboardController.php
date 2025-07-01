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
        return view('dashboard.user', compact('subscriptions'));
    }

    public function pauseSubscription(Request $request, Subscription $subscription, SubscriptionService $service)
    {
        // Authorization: ensure user owns the subscription
        if (auth()->id() !== $subscription->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
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
