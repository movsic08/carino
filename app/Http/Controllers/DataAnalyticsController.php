<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DataAnalyticsController extends Controller
{
    
    public function showDataAnalytics()
    {

        $clients = Client::all();
        return view('admin.data-analytics', compact('clients'));
    }
    
    public function showGenderBasedAnalytics()
    {
        // Get the monthly counts of female and male clients
        $genderCounts = Client::selectRaw('gender, COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('gender', 'month')
            ->get();

        // Separate the counts for female and male
        $femaleCounts = $genderCounts->where('gender', 'female')->pluck('count', 'month')->toArray();
        $maleCounts = $genderCounts->where('gender', 'male')->pluck('count', 'month')->toArray();

        // Fill in missing months with zero counts
        $months = range(1, 12);
        $femaleData = array_fill_keys($months, 0);
        $maleData = array_fill_keys($months, 0);

        $femaleData = array_merge($femaleData, $femaleCounts);
        $maleData = array_merge($maleData, $maleCounts);

        // Example: Return the admin.data-analytics-index view with data
        return view('admin.data-analytics-index', [
            'femaleData' => json_encode(array_values($femaleData)),
            'maleData' => json_encode(array_values($maleData)),
        ]);
    }


    public function getTotalClients()
    {
        $totalClients = Client::count();

        return response()->json(['totalClients' => $totalClients]);
    }
}
