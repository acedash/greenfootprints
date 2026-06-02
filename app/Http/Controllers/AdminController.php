<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\FootprintRecord;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCarbon = FootprintRecord::sum('carbon_kg');
        
        $activeCities = User::whereNotNull('city')->distinct()->count('city');

        $cityStats = User::select('city', DB::raw('count(*) as count'))
            ->groupBy('city')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('totalUsers', 'totalCarbon', 'activeCities', 'cityStats'));
    }

    public function users(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function leaderboard(Request $request)
    {
        // Get the top 50 users based on total_carbon (lowest is best, but we'll show lowest carbon footprints as top, wait actually in this app, saving carbon debt is good, but wait: the user's dashboard shows tracking of carbon *emitted*. So leaderboard usually ranks by lowest emissions OR highest trees debt covered. The current leaderboard controller ranks by `total_carbon` ASC).
        $users = User::orderBy('total_carbon', 'asc')->paginate(50);
        return view('admin.leaderboard', compact('users'));
    }

    public function analytics(Request $request)
    {
        // Get daily footprint data for the last 30 days
        $startDate = now()->subDays(30)->startOfDay();
        
        $dailyStats = FootprintRecord::where('date', '>=', $startDate)
            ->select(
                'date',
                DB::raw('SUM(carbon_kg) as total_carbon'),
                DB::raw('SUM(plastic_kg) as total_plastic')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $labels = $dailyStats->pluck('date')->map(function($date) {
            return \Carbon\Carbon::parse($date)->format('M d');
        });
        $carbonData = $dailyStats->pluck('total_carbon');
        $plasticData = $dailyStats->pluck('total_plastic');

        // Transport Mode breakdown
        $transportStats = FootprintRecord::select('transport_mode', DB::raw('count(*) as count'))
            ->groupBy('transport_mode')
            ->get();

        return view('admin.analytics', compact('labels', 'carbonData', 'plasticData', 'transportStats'));
    }
}
