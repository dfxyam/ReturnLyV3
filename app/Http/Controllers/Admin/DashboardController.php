<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Claim;
use App\Models\FoundItem;
use App\Models\Location;
use App\Models\LostItem;
use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_lost' => LostItem::count(),
            'total_found' => FoundItem::count(),
            'total_claims' => Claim::count(),
            'pending_claims' => Claim::where('status', 'Pending')->count(),
            'returned_items' => FoundItem::where('status', 'Dikembalikan')->count() + LostItem::where('status', 'Selesai')->count(),
            'total_categories' => Category::count(),
            'total_locations' => Location::count(),
        ];

        $recentLostItems = LostItem::with(['category', 'location'])->latest()->take(5)->get();
        $recentFoundItems = FoundItem::with(['category', 'location'])->latest()->take(5)->get();
        $recentClaims = Claim::with('foundItem')->latest()->take(5)->get();
        $recentActivities = ActivityLog::latest('created_at')->take(8)->get();
        $unreadNotificationsCount = Notification::where('is_read', false)->count();

        return view('admin.dashboard', compact(
            'stats',
            'recentLostItems',
            'recentFoundItems',
            'recentClaims',
            'recentActivities',
            'unreadNotificationsCount'
        ));
    }
}
