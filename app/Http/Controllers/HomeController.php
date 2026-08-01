<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $locations = Location::all();

        $latestLostItems = LostItem::with(['category', 'location'])
            ->where('status', 'lost')
            ->latest()
            ->take(6)
            ->get();

        $latestFoundItems = FoundItem::with(['category', 'location'])
            ->where('status', 'found')
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('categories', 'locations', 'latestLostItems', 'latestFoundItems'));
    }
}
