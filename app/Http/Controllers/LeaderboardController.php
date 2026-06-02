<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\FootprintRecord;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Get the latest footprint for each user, then rank by lowest trees_debt
        $leaders = FootprintRecord::select('user_id', DB::raw('MAX(created_at) as latest_date'))
            ->groupBy('user_id');

        $query = FootprintRecord::joinSub($leaders, 'latest_records', function ($join) {
            $join->on('footprint_records.user_id', '=', 'latest_records.user_id')
                 ->on('footprint_records.created_at', '=', 'latest_records.latest_date');
        })
        ->join('users', 'footprint_records.user_id', '=', 'users.id')
        ->select('users.name', 'users.city', 'users.profession', 'footprint_records.trees_debt');

        if (request('filter') === 'city') {
            $query->where('users.city', auth()->user()->city);
        }

        $leaderboard = $query->orderBy('trees_debt', 'asc')
            ->take(10)
            ->get();

        return view('leaderboard', compact('leaderboard'));
    }
}
