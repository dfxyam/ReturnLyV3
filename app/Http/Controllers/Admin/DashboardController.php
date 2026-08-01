<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLostItems = LostItem::count();
        $totalFoundItems = FoundItem::count();
        $pendingClaimsCount = Claim::where('status', 'pending')->count();
        $returnedItemsCount = FoundItem::where('status', 'returned')->count() + LostItem::where('status', 'returned')->count();

        $recentLostItems = LostItem::with(['category', 'location'])->latest()->take(5)->get();
        $recentFoundItems = FoundItem::with(['category', 'location'])->latest()->take(5)->get();
        $recentClaims = Claim::with(['foundItem', 'lostItem'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalLostItems',
            'totalFoundItems',
            'pendingClaimsCount',
            'returnedItemsCount',
            'recentLostItems',
            'recentFoundItems',
            'recentClaims'
        ));
    }
}
