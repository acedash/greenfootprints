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
        $users = User::withSum('footprints as total_carbon', 'carbon_kg')
            ->withSum('footprints as trees_debt', 'trees_debt')
            ->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function leaderboard(Request $request)
    {
        $users = User::withSum('footprints as total_carbon', 'carbon_kg')
            ->withSum('footprints as trees_debt', 'trees_debt')
            ->orderBy('total_carbon', 'asc')->paginate(50);
        return view('admin.leaderboard', compact('users'));
    }

    public function analytics(Request $request)
    {
        // Get daily footprint data for the last 30 days
        $startDate = now()->subDays(30)->startOfDay();
        
        $dailyStats = FootprintRecord::where('created_at', '>=', $startDate)
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(carbon_kg) as total_carbon'),
                DB::raw('SUM(plastic_kg) as total_plastic')
            )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'asc')
            ->get();

        $labels = $dailyStats->pluck('date')->map(function($date) {
            return \Carbon\Carbon::parse($date)->format('M d');
        });
        $carbonData = $dailyStats->pluck('total_carbon');
        $plasticData = $dailyStats->pluck('total_plastic');

        // Transport Mode breakdown mapping
        $transportStats = FootprintRecord::select('transport_mode_factor', DB::raw('count(*) as count'))
            ->groupBy('transport_mode_factor')
            ->get()
            ->map(function($stat) {
                $factor = (string) $stat->transport_mode_factor;
                if ($factor === '0.192') $mode = 'Petrol/Diesel Car';
                elseif ($factor === '0.105') $mode = 'Public Bus';
                elseif ($factor === '0.06') $mode = 'Two-Wheeler';
                elseif ($factor === '0.04') $mode = 'Electric Vehicle';
                elseif ($factor === '0') $mode = 'Walking/Cycling';
                else $mode = 'Other';
                
                return (object) [
                    'transport_mode' => $mode,
                    'count' => $stat->count
                ];
            });

        return view('admin.analytics', compact('labels', 'carbonData', 'plasticData', 'transportStats'));
    }
}
