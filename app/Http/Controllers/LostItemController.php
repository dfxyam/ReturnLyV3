<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLostItemRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use App\Models\Notification;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    public function index(Request $request)
    {
        $query = LostItem::with(['category', 'location']);

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

        return view('lost-items.index', compact('items', 'categories', 'locations'));
    }

    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('lost-items.create', compact('categories', 'locations'));
    }

    public function store(StoreLostItemRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('items', 'public');
            $data['photo'] = $path;
        }

        $data['status'] = 'Belum Ditemukan';
        $lostItem = LostItem::create($data);

        // System notification for admin
        Notification::create([
            'title' => 'Laporan Kehilangan Baru',
            'message' => "Laporan baru dari {$lostItem->reporter_name} untuk barang '{$lostItem->item_name}'.",
        ]);

        return redirect()->route('lost-items.show', $lostItem->id)
            ->with('success', 'Laporan barang hilang berhasil dikirim.');
    }

    public function show($id)
    {
        $item = LostItem::with(['category', 'location'])->findOrFail($id);

        return view('lost-items.show', compact('item'));
    }
}
