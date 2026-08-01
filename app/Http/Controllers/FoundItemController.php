<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoundItemRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class FoundItemController extends Controller
{
    public function index(Request $request)
    {
        $query = FoundItem::with(['category', 'location']);

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

        $foundItems = $query->latest()->paginate(9)->withQueryString();
        $categories = Category::all();
        $locations = Location::all();

        return view('found-items.index', compact('foundItems', 'categories', 'locations'));
    }

    public function show($id)
    {
        $item = FoundItem::with(['category', 'location'])->findOrFail($id);
        return view('found-items.show', compact('item'));
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

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('found-items', 'public');
        }

        $data['status'] = 'found';

        FoundItem::create($data);

        return redirect()->route('found-items.index')
            ->with('success', 'Laporan barang ditemukan berhasil dikirim! Terima kasih atas kebaikan Anda.');
    }
}
