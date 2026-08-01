<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Http\Request;

class AdminFoundItemController extends Controller
{
    public function index(Request $request)
    {
        $query = FoundItem::with(['category', 'location']);

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

        $foundItems = $query->latest()->paginate(10)->withQueryString();

        return view('admin.found-items.index', compact('foundItems'));
    }

    public function show($id)
    {
        $item = FoundItem::with(['category', 'location', 'claims'])->findOrFail($id);

        // Smart Manual Matching: find lost_items with matching category and location
        $matchingLostItems = LostItem::with(['category', 'location'])
            ->where('category_id', $item->category_id)
            ->where('location_id', $item->location_id)
            ->where('status', 'lost')
            ->get();

        return view('admin.found-items.show', compact('item', 'matchingLostItems'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:found,claimed,returned',
        ]);

        $item = FoundItem::findOrFail($id);
        $item->update(['status' => $request->status]);

        return back()->with('success', 'Status barang ditemukan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = FoundItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.found-items.index')
            ->with('success', 'Laporan barang ditemukan berhasil dihapus.');
    }
}
