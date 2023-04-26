<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecentActivityController extends Controller
{
    public function index()
    {
        $recentActivity = $this->getRecentActivity();

        return view('recent-activity', compact('recentActivity'));
    }

    public function getRecentActivity()
    {
        // Retrieve the recent activity data from your database or any other data source
        $recentActivity = DB::table('activity_logs')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        // Return the data as a collection or array
        return collect($recentActivity);
    }
}
