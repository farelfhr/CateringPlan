<?php

namespace App\Services;

use App\Models\Subscription;

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
} 