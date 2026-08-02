<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoundItemRequest;
use App\Models\Category;
use App\Models\FoundItem;
use App\Models\Location;
use App\Models\Notification;
use Illuminate\Http\Request;

class FoundItemController extends Controller
{
    public function index(Request $request)
    {
        $query = FoundItem::with(['category', 'location']);

        if ($request->filled('search')) {
            $query->where('item_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $items = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();
        $locations = Location::all();

        return view('found-items.index', compact('items', 'categories', 'locations'));
    }

    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('found-items.create', compact('categories', 'locations'));
    }

    public function store(StoreFoundItemRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('items', 'public');
            $data['photo'] = $path;
        }

        $data['status'] = 'Menunggu Pemilik';
        $foundItem = FoundItem::create($data);

        // System notification for admin
        Notification::create([
            'title' => 'Laporan Penemuan Baru',
            'message' => "Barang ditemukan oleh {$foundItem->finder_name}: '{$foundItem->item_name}'.",
        ]);

        return redirect()->route('found-items.show', $foundItem->id)
            ->with('success', 'Laporan penemuan barang berhasil dikirim.');
    }

    public function show($id)
    {
        $item = FoundItem::with(['category', 'location', 'claims'])->findOrFail($id);

        return view('found-items.show', compact('item'));
    }
}
