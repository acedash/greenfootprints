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
}
