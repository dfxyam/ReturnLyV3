<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class AdminLostItemController extends Controller
{
    public function index(Request $request)
    {
        $query = LostItem::with(['category', 'location']);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('item_name', 'like', "%{$search}%")
                  ->orWhere('contact_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $lostItems = $query->latest()->paginate(10)->withQueryString();

        return view('admin.lost-items.index', compact('lostItems'));
    }

    public function show($id)
    {
        $item = LostItem::with(['category', 'location'])->findOrFail($id);

        // Smart Manual Matching: find found_items with matching category or location
        $matchingFoundItems = FoundItem::with(['category', 'location'])
            ->where('category_id', $item->category_id)
            ->where('location_id', $item->location_id)
            ->where('status', 'found')
            ->get();

        return view('admin.lost-items.show', compact('item', 'matchingFoundItems'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lost,claimed,returned',
        ]);

        $item = LostItem::findOrFail($id);
        $item->update(['status' => $request->status]);

        return back()->with('success', 'Status barang hilang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = LostItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.lost-items.index')
            ->with('success', 'Laporan barang hilang berhasil dihapus.');
    }
}
