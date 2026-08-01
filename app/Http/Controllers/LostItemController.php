<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLostItemRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    public function index(Request $request)
    {
        $query = LostItem::with(['category', 'location']);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('item_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
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

        $lostItems = $query->latest()->paginate(9)->withQueryString();
        $categories = Category::all();
        $locations = Location::all();

        return view('lost-items.index', compact('lostItems', 'categories', 'locations'));
    }

    public function show($id)
    {
        $item = LostItem::with(['category', 'location'])->findOrFail($id);
        return view('lost-items.show', compact('item'));
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

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lost-items', 'public');
        }

        $data['status'] = 'lost';

        LostItem::create($data);

        return redirect()->route('lost-items.index')
            ->with('success', 'Laporan barang hilang berhasil dikirim! Kami akan memberi tahu Anda jika barang ditemukan.');
    }
}
