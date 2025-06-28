<?php
namespace App\Services;
use App\Models\Subscription;
class SubscriptionService
{
    public function pause(Subscription $subscription, $start, $end)
    {
        $subscription->status = 'paused';
        $subscription->pause_start_date = $start;
        $subscription->pause_end_date = $end;
        $subscription->save();
    }
} 