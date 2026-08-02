<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
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
            'name' => ['required', 'string', 'max:100', 'unique:locations,name'],
        ], [
            'name.required' => 'Nama lokasi wajib diisi.',
            'name.unique' => 'Nama lokasi sudah ada.',
        ]);

        $location = Location::create(['name' => $request->name]);

        ActivityLog::create([
            'activity' => 'Tambah Lokasi',
            'description' => "Menambahkan lokasi baru '{$location->name}'.",
        ]);

        return back()->with('success', 'Lokasi baru berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:locations,name,' . $id],
        ], [
            'name.required' => 'Nama lokasi wajib diisi.',
            'name.unique' => 'Nama lokasi sudah ada.',
        ]);

        $oldName = $location->name;
        $location->update(['name' => $request->name]);

        ActivityLog::create([
            'activity' => 'Edit Lokasi',
            'description' => "Mengubah nama lokasi dari '{$oldName}' menjadi '{$location->name}'.",
        ]);

        return back()->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $name = $location->name;

        if ($location->lostItems()->exists() || $location->foundItems()->exists()) {
            return back()->with('error', "Lokasi '{$name}' tidak dapat dihapus karena masih digunakan oleh data barang.");
        }

        $location->delete();

        ActivityLog::create([
            'activity' => 'Hapus Lokasi',
            'description' => "Menghapus lokasi '{$name}'.",
        ]);

        return back()->with('success', 'Lokasi berhasil dihapus.');
    }
}
