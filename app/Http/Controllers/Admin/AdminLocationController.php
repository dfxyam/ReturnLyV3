<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class AdminLocationController extends Controller
{
    public function index()
    {
        $locations = Location::withCount(['lostItems', 'foundItems'])->latest()->paginate(10);
        return view('admin.locations.index', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:locations,name',
        ]);

        Location::create($request->only('name'));

        return redirect()->route('admin.locations.index')
            ->with('success', 'Lokasi baru berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:locations,name,' . $location->id,
        ]);

        $location->update($request->only('name'));

        return redirect()->route('admin.locations.index')
            ->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        if ($location->lostItems()->count() > 0 || $location->foundItems()->count() > 0) {
            return back()->with('error', 'Lokasi tidak dapat dihapus karena sedang digunakan oleh data barang.');
        }

        $location->delete();

        return redirect()->route('admin.locations.index')
            ->with('success', 'Lokasi berhasil dihapus.');
    }
}
