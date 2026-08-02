<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoundItem;
use App\Models\Location;
use App\Models\LostItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $latestLostItems = LostItem::with(['category', 'location'])
            ->latest()
            ->take(6)
            ->get();

        $latestFoundItems = FoundItem::with(['category', 'location'])
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::withCount(['lostItems', 'foundItems'])->get();
        $locations = Location::all();

        $stats = [
            'total_lost' => LostItem::count(),
            'total_found' => FoundItem::count(),
            'total_returned' => FoundItem::where('status', 'Dikembalikan')->count() + LostItem::where('status', 'Selesai')->count(),
        ];

        return view('home', compact('latestLostItems', 'latestFoundItems', 'categories', 'locations', 'stats'));
    }
}
