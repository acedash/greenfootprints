<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FootprintRecord;
use Illuminate\Support\Facades\Auth;

class FootprintController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'plastic_items' => 'required|integer',
            'commute_km' => 'required|integer',
            'transport_mode_factor' => 'required|numeric',
            'is_segregating' => 'required|boolean',
            'carbon_kg' => 'required|numeric',
            'plastic_kg' => 'required|numeric',
            'trees_debt' => 'required|numeric',
        ]);

        $record = FootprintRecord::where('user_id', Auth::id())
            ->whereDate('created_at', now()->toDateString())
            ->first();

        if ($record) {
            $record->update($validated);
        } else {
            $record = FootprintRecord::create(array_merge(['user_id' => Auth::id()], $validated));
        }

        return response()->json(['success' => true, 'record' => $record]);
    }

    public function history()
    {
        $records = FootprintRecord::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('history', compact('records'));
    }

    public function downloadCertificate()
    {
        $user = Auth::user();
        $record = FootprintRecord::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('certificate', compact('user', 'record'));
        
        return $pdf->download('sustainability-certificate.pdf');
    }
}
