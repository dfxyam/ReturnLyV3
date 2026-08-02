<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Http\Request;

class AdminMatchingController extends Controller
{
    public function index(Request $request)
    {
        $unfoundLostItems = LostItem::with(['category', 'location'])
            ->where('status', 'Belum Ditemukan')
            ->latest()
            ->get();

        $selectedLostItem = null;
        $recommendations = collect();

        if ($request->filled('lost_item_id')) {
            $selectedLostItem = LostItem::with(['category', 'location'])->find($request->lost_item_id);

            if ($selectedLostItem) {
                // Smart query per PRD Section 8.2
                $recommendations = FoundItem::with(['category', 'location'])
                    ->where('category_id', $selectedLostItem->category_id)
                    ->where('location_id', $selectedLostItem->location_id)
                    ->where('status', 'Menunggu Pemilik')
                    ->latest()
                    ->get();
            }
        }

        return view('admin.matching.index', compact('unfoundLostItems', 'selectedLostItem', 'recommendations'));
    }
}
