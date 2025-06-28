<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class UserDashboardController extends Controller
{
    public function index()
    {
        $subscriptions = auth()->user()->subscriptions()->with('mealPlan')->get();
        return view('dashboard.user', compact('subscriptions'));
    }

    public function pauseSubscription(Request $request, Subscription $subscription)
    {
        // Authorization: ensure user owns the subscription
        if (auth()->id() !== $subscription->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'pause_start_date' => 'required|date|after:today',
            'pause_end_date' => 'required|date|after:pause_start_date',
        ]);

        $subscription->update([
            'status' => 'paused',
            'pause_start_date' => $request->pause_start_date,
            'pause_end_date' => $request->pause_end_date,
        ]);

        return redirect()->back()->with('success', 'Subscription paused successfully!');
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
}
